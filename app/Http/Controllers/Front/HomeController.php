<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactForm\StoreContactFormValidation;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Career;
use App\Models\ContactForm;
use App\Models\Event;
use App\Models\EventForm;
use App\Models\FAQ;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use App\Traits\FileUpload;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;



class HomeController extends Controller
{
    use FileUpload;

    public $file_name;
    protected $_site_profile;

    public function __construct()
    {
        $this->_site_profile = SiteSetting::first();
    }

    //HOME page
    public function index()
    {
        $data = [];

        $data['_site_profile'] = $this->_site_profile;
        if ($data['_site_profile']) {
            $data['_site_profile']->increment('view_count');
        }

        $data['_message'] = Testimonial::select('*')
            ->message()
            ->active()
            ->rank(1)
            ->limit(1)
            ->get(1);
        $data['video'] = File::select('title', 'nepali_title', 'link', 'file', 'file_type', 'created_at')->active()->where('file_type', 'video')->rank()->get();
        $data['intro'] = File::select('title', 'excerpt', 'file', 'file_type', 'created_at')->active()->where('file_type', 'intro')->rank()->get();
        $data['service'] = Service::orderBy('rank', 'asc')->limit(6)->get();
        $data['_partners'] = Partner::select('title', 'photo', 'url', 'rank', 'type', 'slug', 'status')
            ->orderBy('rank')
            ->where('type', 1)
            ->get();

        $data['assopartner'] = Partner::select('title', 'type', 'photo', 'url', 'rank', 'slug', 'status')
            ->orderBy('rank')
            ->where('type', 0)
            ->get();

        $data['_blogs'] = Blog::latest()->whereIn('type', ['blog'])->latest()->active()->limit(3)->get();
        $data['_slider'] = Slider::select('title', 'photo', 'excerpt', 'caption_position', 'image_mode', 'url')->orderBy('rank')->active()->limit(5)->get();



        return view('frontend.home', compact('data'));
    }



    public function aboutus()
    {

        $about_list = AboutUs::select('id', 'slug', 'title', 'excerpt')->active()->limit(3)->get();

        $data['about'] = File::whereFileType('about')->first();
        $data['about2'] = File::whereFileType('about2')->first();
        $data['about3'] = File::whereFileType('about3')->first();
        $data['about4'] = File::whereFileType('about4')->first();
        $data['_news'] = Blog::select('title', 'created_at', 'photo', 'slug', 'type', 'date', 'excerpt', 'author')->where(function ($query) {
            $query->where('type', 'news');
        })->latest()->active()->paginate(2);
        $type = 'news';

        return view('frontend.aboutus', compact('about_list', 'data'));
    }
    public function aboutDetail($slug)
    {
        $data['about'] = File::whereFileType('about')->first();
        $about_list = AboutUs::select('id', 'slug', 'title', 'excerpt')->active()->orderBy('rank')->get();
        $about = AboutUs::where('slug', $slug)->active()->firstOrFail();

        return view('frontend.about-detail', compact('about_list', 'about', 'data'));
    }


    public function blog()
    {
        $_blogs = Blog::select('title', 'date', 'created_at', 'author', 'excerpt', 'photo', 'slug', 'type')->whereType('blog')->orderBy('created_at')->active()->paginate(6);

        return view('frontend.blog', compact('_blogs'));
    }

    public function blogsDetail($slug)
    {
        $_blogs = Blog::select('title', 'date', 'author', 'created_at', 'photo', 'slug', 'excerpt', 'created_at')->where('slug', $slug)->first();

        if ($_blogs)
            $next_blogs = Blog::select('slug', 'type')->whereType('blog')->where('created_at', '>', $_blogs->created_at)->orderBy('created_at')->active()->first();
        $previous_blogs = Blog::select('slug', 'type')->whereType('blog')->where('created_at', '<', $_blogs->created_at)->orderBy('created_at')->active()->first();

        $_related_blogs = Blog::select('title', 'author', 'created_at', 'photo', 'slug', 'excerpt', 'created_at')->whereNot('slug', $slug)->whereType('blog')->orderBy('created_at')->active()->limit(6)->get();
        return view('frontend.blog-detail', compact('_blogs', 'next_blogs', 'previous_blogs', '_related_blogs'), ['type' => 'blog']);
        return abort(404);
    }
    public function partner()
    {
        $_partner = Partner::select('title', 'url', 'rank',  'photo', 'slug', 'status')->orderBy('rank')->latest()->active()
            ->paginate(6);

        return view('frontend.partner', compact('_partner'));
    }



    public function news()
    {
        $_news = Blog::select('title', 'created_at', 'photo', 'slug', 'type', 'date', 'excerpt', 'author')->where(function ($query) {
            $query->where('type', 'news');
        })->latest()->active()->paginate(2);
        $type = 'news';
        $all_news = Blog::select('title', 'created_at', 'photo', 'slug', 'type', 'date', 'excerpt', 'author')->where(function ($query) {
            $query->where('type', 'news');
        })->latest()->active()->get();
        return view('frontend.news', compact('_news', 'type', 'all_news'));
    }
    public function events()
    {
        $_news = Blog::select('title', 'date', 'created_at', 'author', 'excerpt', 'photo', 'slug', 'type')->whereType('event')->orderBy('created_at')->active()->paginate(6);


        return view('frontend.events', compact('_news'));
    }
    //timeline
    public function timelineDetail($slug)
    {
        $_blogs = Blog::select('title', 'date', 'author', 'created_at', 'photo', 'slug', 'excerpt', 'created_at')->where('slug', $slug)->first();


        return view('frontend.timeline-detail', compact('_blogs'), ['type' => 'news']);
        return abort(404);
    }


    public function eventDetail($slug)
    {
        $_news = Blog::select('title', 'date', 'author', 'created_at', 'photo', 'slug', 'excerpt', 'created_at')->where('slug', $slug)->first();

        if ($_news)
            $next_news = Blog::select('slug', 'type')->whereType('blog')->where('created_at', '>', $_news->created_at)->orderBy('created_at')->active()->first();
        $previous_news = Blog::select('slug', 'type')->whereType('blog')->where('created_at', '<', $_news->created_at)->orderBy('created_at')->active()->first();

        $_related_news = Blog::select('title', 'author', 'created_at', 'photo', 'slug', 'excerpt', 'created_at')->whereNot('slug', $slug)->whereType('blog')->orderBy('created_at')->active()->limit(6)->get();
        return view('frontend.event-detail', compact('_news', 'next_news', 'previous_news', '_related_news'), ['type' => 'event']);
        return abort(404);
    }


    public function notice()
    {
        $_notice = Notice::select('title', 'start_date', 'end_date', 'photo', 'slug', 'excerpt')
            ->active()
            ->orderBy('created_at', 'desc')
            ->whereIn('displaystat', [0, 2])
            ->paginate(6);
        $all_Notice = Notice::select('title', 'start_date', 'end_date', 'photo', 'slug', 'excerpt')
            ->active()
            ->whereIn('displaystat', [0, 2])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.notice', compact('_notice', 'all_Notice'));
    }


    //notice Page
    public function noticeDetail($slug)
    {
        $_notice = Notice::select('title', 'start_date', 'end_date', 'photo', 'slug', 'excerpt')->where('slug', $slug)->first();
        $all_Notice = Notice::select('id', 'title', 'start_date', 'end_date', 'photo', 'slug', 'excerpt')
            ->active()
            ->whereIn('displaystat', [0, 2])
            ->whereNot('id', $_notice->id)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($_notice)
            return view('frontend.notice-detail', compact('_notice', 'all_Notice'));
        return abort(404);
    }
    public function career(Request $request)
    {
        $query = Career::active();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('department')) {
            $query->where('job_cat', $request->department);
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'latest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                case 'az':
                    $query->orderBy('title', 'asc');
                    break;
                case 'za':
                    $query->orderBy('title', 'desc');
                    break;
            }
        }

        $careers = $query->paginate(10);
        $locations = Career::distinct()->pluck('location');
        $departments = Career::distinct()->pluck('job_cat');

        return view('frontend.career', compact('careers', 'locations', 'departments'));
    }




    //notice Page
    public function careerDetail($slug)
    {
        $siteSetting = $this->_site_profile;
        $career = Career::where('slug', $slug)->active()->firstOrFail();
        return view('frontend.career-detail', compact('career', 'siteSetting'));
        return abort(404);
    }

    public function bulletin()
    {
        $_bulletin = File::select('id', 'title', 'file', 'link', 'file_type', 'slug', 'created_at')
            ->active()
            ->where('file_type', 'ebulletin')
            ->rank()
            ->get();

        return view('frontend.bulletin', compact('_bulletin'));
    }
    public function branches()
    {

        $_branch = AboutUs::select('title', 'nepali_title', 'slug', 'map_link', 'email', 'excerpt')->where('isbranch', 0)
            ->branch()
            ->active()
            ->get();

        return view('frontend.branches', compact(''));
    }


    public function downloads()
    {
        $_download = File::select('title', 'file', 'file_type', 'link', 'created_at')
            ->active()
            ->where('file_type', 'download')
            ->rank()
            ->get();
        $_reports = File::select('title', 'file', 'file_type', 'link', 'created_at')
            ->active()
            ->where('file_type', 'report')
            ->rank()
            ->get();
        $_publication = File::select('title', 'file', 'file_type', 'link', 'created_at')
            ->active()
            ->where('file_type', 'publication')
            ->rank()
            ->get();
        $_stat_report = File::select('title', 'file', 'file_type', 'link', 'created_at')
            ->active()
            ->where('file_type', 'stat_report')
            ->latest()
            ->get();

        return view('frontend.downloads', compact('_reports', '_publication', '_download', '_stat_report'));
    }
    public function downloadDetail($slug)
    {
        $_download = File::select('title', 'file', 'file_type', 'created_at')
            ->active()
            ->where('file_type', $slug)
            ->rank()
            ->get();
        return view('frontend.downloadDetail', compact('_reports'));
    }
    public function video()
    {
        $_video = File::select('title', 'file', 'link', 'file_type', 'created_at')
            ->active()
            ->where('file_type', 'video')
            ->rank()
            ->get();

        return view('frontend.video', compact('_video'));
    }
    public function faq()
    {
        $_faq = FAQ::active()
            ->rank()
            ->get();

        return view('frontend.faq', compact('_faq'));
    }




    public function services()
    {

        $services = ServiceCategory::with('services')->get();

        return view('frontend.services', compact('services'));
    }

    public function service($slug)
    {

        $serviceCategory = ServiceCategory::with('services')->where('slug', $slug)->first();
        if (!$serviceCategory) {
            return abort(404);
        }
        $_service = $serviceCategory->services()
            ->select('*')
            ->orderBy('rank')
            ->paginate(8);
        $_service_list = $serviceCategory->services()->rank()->get();


        return view('frontend.service', compact('serviceCategory', '_service', '_service_list',));
    }


    public function serviceDetail($slug, Request $request)
    {
        // Fetch the service detail by slug
        $_service = Service::where('slug', $slug)->first();

        // If service is not found, abort with 404
        if (!$_service) {
            return abort(404);
        }


        $all_service = Service::select('*')
            ->active()
            ->where('service_category_id', $_service->service_category_id)
            ->where('id', '!=', $_service->id)
            ->rank()
            ->get();


        return view('frontend.service-detail', compact('_service', 'all_service'));
    }

    //gallery Page
    public function gallery()
    {
        $_gallery = Gallery::select('cover_photo', 'title', 'slug')->active()
            ->latest()
            ->limit(6)
            ->paginate(config('helper.pagination_limit'));

        return view('frontend.gallery', compact('_gallery'));
    }
    //gallery Page
    public function galleryDetail($slug)
    {
        $_gallery = Gallery::with('images')->where('slug', $slug)->first();

        if ($_gallery)
            return view('frontend.gallery-detail', compact('_gallery'));
        return abort(404);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(StoreContactFormValidation $request)
    {


        $contactForm = ContactForm::create($request->validated());
        $request->session()->flash('success_message', 'Dear ' . $request->name . ',Your form has been successfully received! Stay in touch with us. Thank you');
        // }
        return redirect()->back();
    }

    public function eventForm($id)
    {
        $data = [];
        $data['event'] = Event::select('*')->where('id', $id)->first();
        return view('frontend.form.event-form', compact('id', 'data'));
    }

    //event store
    public function eventStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nepali_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'nepali_organization_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'telephone_no' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:event_forms,email,NULL,id,event_id,' . $id
            ],
            'voucher_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        try {
            // Add event_id to validated data
            $validatedData['event_id'] = $id;

            // Handle file upload
            if ($request->hasFile('voucher_photo')) {
                $file = $request->file('voucher_photo');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/eventForm'), $fileName);
                $validatedData['voucher_photo'] = $fileName;
            }

            // Store the validated data
            EventForm::create($validatedData);

            return redirect()->route('eventForm', ['id' => $id])
                ->with('success', 'Event registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while registering. Please try again.');
        }
    }

    public function memberMessageDetail($slug)
    {
        $data = [];
        $data['_message'] = Testimonial::select('*')->where('slug', $slug)->message()->active()->first();

        if (!$data['_message']) {
            return abort(404);
        }

        return view('frontend.member-message-detail', compact('data'));
    }

    public function viewPdf($id)
    {
        $_bulletin = File::select('id', 'title', 'file', 'link', 'file_type', 'slug', 'created_at')
            ->active()
            ->where('id', $id)
            ->where('file_type', 'ebulletin')
            ->rank()
            ->first();

        return view('frontend.bulletinView', compact('_bulletin'));
    }
    public function getPdf($id)
    {
        $bulletIn = File::select('file', 'link')
            ->where('file_type', 'ebulletin')
            ->findOrFail($id);

        $driveLink = $bulletIn->link . "/edit";

        // $driveLink = 'https://drive.google.com/file/d/1iqgO_ZYvelVJvvvlWvuc6--M9k-BLKcc/edit';

        // Extract the file ID from the Google Drive link
        $fileId = $this->extractDriveFileId($driveLink);

        // Create the direct download link
        $directLink = "https://drive.google.com/uc?export=download&id={$fileId}";

        // Fetch the PDF content
        $response = Http::get($directLink);

        // Return the PDF content as a response
        return response($response->body())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="bulletin.pdf"');
    }

    private function extractDriveFileId($url)
    {
        preg_match('/\/d\/(.*?)\//', $url, $matches);
        return $matches[1] ?? null;
    }
}
