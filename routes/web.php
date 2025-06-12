<?php

use App\Models\Member;
use App\Models\MemberCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use  App\Http\Controllers\Admin\SliderController;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Hour;
use App\Models\File;

use App\Models\Notice;
use App\Models\Partner;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\Testimonial;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Increment view count when the website is refreshed or viewed


\Illuminate\Support\Facades\View::composer(['*'], function ($site_data) {
    $site_profile = \App\Models\SiteSetting::first();
    $_about_us = AboutUs::select('title', 'rank', 'slug', 'excerpt')->orderBy('rank')->about()->active()->get();
    $_service_category = ServiceCategory::select('name', 'slug', 'rank', 'status')->active()->rank()->get();
    $_member_category = MemberCategory::whereNull('parent_id')->with('children')->active()->rank()->get();
    $_message = Testimonial::select('id', 'name', 'post', 'photo', 'type', 'excerpt', 'slug', 'rank')->message()->active()->rank()->get(2);
    $_event_form = \App\Models\Event::latest()->active()->limit(2)->get();
    $_about_us_footer = AboutUs::select('*')->orderBy('rank')->first();
    $_audio = File::where('file_type', 'audio')->first();
    $_aboutSlider = Slider::select('photo')->orderBy('rank')->active()->skip(1)->first() ?? null;

    $_breaking = Notice::select('title', 'slug', 'excerpt', 'created_at')->whereIn('displaystat', [1, 2])->active()->limit(10)->get();
    $_partner = Partner::active()->rank()->get();
    $_isinfo = Member::select('name', 'post', 'photo', 'excerpt', 'phone', 'email', 'isinfo')
        ->active()
        ->where('isinfo', 1)
        ->limit(1)
        ->get();
    $_branch = AboutUs::select('title', 'nepali_title', 'slug', 'map_link', 'email', 'excerpt')
        ->branch()
        ->active()
        ->get();
    $_blog = Blog::latest()->whereIn('type', ['blog'])->latest()->active()->limit(3)->get();

    $opening_times =  Hour::pluck('excerpt')->all();


    $site_data->with([
        '_seo' => \App\Models\Seo::first(),
        '_site_profile' => $site_profile,
        '_message' => $_message,
        '_aboutSlider' => $_aboutSlider,
        '_member_category' => $_member_category,

        '_service_category' => $_service_category,
        '_about_us' => $_about_us,
        '_breaking' => $_breaking,
        '_partner' => $_partner,
        '_event_form' => $_event_form,
        '_about_us_footer' => $_about_us_footer,
        '_isinfo' => $_isinfo,
        '_audio' => $_audio,
        '_branch' => $_branch,
        '_blog' => $_blog,
        'opening_times' => $opening_times
    ]);
});


Route::get('/',                     [HomeController::class, 'index'])->name('index');
Route::get('notice-detail/{slug}',  [HomeController::class, 'noticeDetail'])->name('noticeDetail');

Route::get('services',          [HomeController::class, 'services'])->name('services');
Route::get('service/{slug}',           [HomeController::class, 'service'])->name('service');
Route::get('service-detail/{slug}', [HomeController::class, 'serviceDetail'])->name('serviceDetail');
Route::get('blog',                  [HomeController::class, 'blog'])->name('blog');
Route::get('blog/{slug}',                  [HomeController::class, 'blogsDetail'])->name('blogDetail');
Route::get('partner',                  [HomeController::class, 'partner'])->name('partner');
Route::get('partner/{slug}',                  [HomeController::class, 'partnersDetail'])->name('partnerDetail');
Route::get('news',                  [HomeController::class, 'news'])->name('news');
Route::get('timeline-detail/{slug}',                  [HomeController::class, 'timelineDetail'])->name('timelineDetail');

Route::get('news-detail/{slug}',                  [HomeController::class, 'newsDetail'])->name('newsDetail');
Route::get('events',                  [HomeController::class, 'events'])->name('events');
Route::get('events/{slug}',                  [HomeController::class, 'eventDetail'])->name('eventDetail');
Route::get('team',                  [HomeController::class, 'team'])->name('team');
Route::get('aboutus/',                 [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('about-detail/{slug}',                 [HomeController::class, 'aboutDetail'])->name('aboutDetail');
Route::get('memberMessage/{slug}',  [HomeController::class, 'memberMessageDetail'])->name('memberMessage.detail');
Route::get('team/{slug}',           [HomeController::class, 'teamDetail'])->name('teamDetail');
Route::get('contact',         [HomeController::class, 'contact'])->name('contact');
Route::post('contact',        [HomeController::class, 'contactStore'])->name('contact.store');
Route::get('event-form/{id}',         [HomeController::class, 'eventForm'])->name('eventForm');
Route::post('event-form/{id}',        [HomeController::class, 'eventStore'])->name('event.store');
Route::get('notice',          [HomeController::class, 'notice'])->name('notice');
Route::get('bulletin', [HomeController::class, 'bulletin'])->name('bulletin');
Route::get('branches', [HomeController::class, 'branches'])->name('branches');
Route::get('downloads',         [HomeController::class, 'downloads'])->name('downloads');
Route::get('downloads/{slug}',         [HomeController::class, 'downloadDetail'])->name('downloadDetail');
Route::get('gallery',         [HomeController::class, 'gallery'])->name('gallery');
Route::get('gallery/{slug}',  [HomeController::class, 'galleryDetail'])->name('gallery.detail');
Route::get('video',         [HomeController::class, 'video'])->name('video');
Route::get('forex',         [HomeController::class, 'forex'])->name('forex');
Route::get('interest',         [HomeController::class, 'interest'])->name('interest');
Route::get('career',                  [HomeController::class, 'career'])->name('career');
Route::get('/career/{slug}', [HomeController::class, 'careerDetail'])->name('careerDetails');

// Route::get('career/{slug}',           [HomeController::class, 'careerDetail'])->name('careerDetail');
Route::get('faq',           [HomeController::class, 'faq'])->name('faq');

Route::get('/bulletinView/{id}', [HomeController::class, 'viewPdf'])->name('bulletin.Viewpdf');
Route::get('/bulletin/pdf/{id}', [HomeController::class, 'getPdf'])->name('bulletin.pdf');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('user/profile', [\App\Http\Controllers\Admin\UserController::class, 'profile'])->name('user.profile');
    Route::post('profileUpdate', [\App\Http\Controllers\Admin\UserController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('passwordUpdate', [\App\Http\Controllers\Admin\UserController::class, 'passwordUpdate'])->name('passwordUpdate');
    Route::resource('role',             \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission',       \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('user',             \App\Http\Controllers\Admin\UserController::class);
    //Sliders
    Route::resource('slider',             SliderController::class);
    Route::post('slider/sort',                   [SliderController::class, 'sort'])
        ->name('slider.sort');

    Route::resource('memberCategory',             \App\Http\Controllers\Admin\MemberCategoryController::class);
    Route::post('memberCategory/sort',                   [\App\Http\Controllers\Admin\MemberCategoryController::class, 'sort'])
        ->name('memberCategory.sort');



    Route::get('member-category/{slug}', [\App\Http\Controllers\Admin\MemberController::class, 'memberCategory'])
        ->name('member-category.index'); // assuming 'admin' is the namespace prefix for your route
    Route::get('member-category/{slug}/create', [\App\Http\Controllers\Admin\MemberController::class, 'memberCategoryCreate'])
        ->name('member.member-category.create');




    Route::resource('member',             \App\Http\Controllers\Admin\MemberController::class);
    Route::post('member/sort',                   [\App\Http\Controllers\Admin\MemberController::class, 'sort'])
        ->name('member.sort');

    Route::resource('serviceCategory',             \App\Http\Controllers\Admin\ServiceCategoryController::class);
    Route::post('serviceCategory/sort',                   [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'sort'])
        ->name('serviceCategory.sort');

    Route::resource('service',             \App\Http\Controllers\Admin\ServiceController::class);
    Route::post('service/sort',                   [\App\Http\Controllers\Admin\ServiceController::class, 'sort'])
        ->name('service.sort');

    Route::resource('aboutUs',             \App\Http\Controllers\Admin\AboutUsController::class);
    Route::post('aboutUs/sort',                   [\App\Http\Controllers\Admin\AboutUsController::class, 'sort'])
        ->name('aboutUs.sort');

    Route::resource('testimonial',             \App\Http\Controllers\Admin\TestimonialController::class);
    Route::post('testimonial/sort',                   [\App\Http\Controllers\Admin\TestimonialController::class, 'sort'])
        ->name('testimonial.sort');


    Route::resource('blog',             \App\Http\Controllers\Admin\BlogController::class);
    Route::post('blog/sort',                   [\App\Http\Controllers\Admin\BlogController::class, 'sort'])
        ->name('blog.sort');

    Route::resource('partner',             \App\Http\Controllers\Admin\PartnerController::class);
    Route::post('partner/sort',                   [\App\Http\Controllers\Admin\PartnerController::class, 'sort'])
        ->name('partner.sort');


    Route::resource('career',             \App\Http\Controllers\Admin\CareerController::class);
    Route::post('career/sort',                   [\App\Http\Controllers\Admin\CareerController::class, 'sort'])
        ->name('career.sort');

    Route::resource('file',             \App\Http\Controllers\Admin\FileController::class);
    Route::post('file/sort',                   [\App\Http\Controllers\Admin\FileController::class, 'sort'])
        ->name('file.sort');

    Route::resource('notice',             \App\Http\Controllers\Admin\NoticeController::class);
    Route::post('notice/sort',                   [\App\Http\Controllers\Admin\NoticeController::class, 'sort'])
        ->name('notice.sort');
    Route::resource('faq',             \App\Http\Controllers\Admin\FaqController::class);
    Route::post('faq/sort',                   [\App\Http\Controllers\Admin\FaqController::class, 'sort'])
        ->name('faq.sort');


    //site-setting
    Route::get('siteSetting',                               [\App\Http\Controllers\Admin\SiteSettingController::class, 'index'])->name('siteSetting.index');
    Route::post('siteSetting/update',                       [\App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('siteSetting.update');

    Route::resource('event',             \App\Http\Controllers\Admin\EventController::class);
    Route::post('event/sort',                   [\App\Http\Controllers\Admin\EventController::class, 'sort'])
        ->name('event.sort');

    Route::resource('eventForm',             \App\Http\Controllers\Admin\EventFormController::class);
    Route::post('eventForm/sort',                   [\App\Http\Controllers\Admin\EventFormController::class, 'sort'])
        ->name('eventForm.sort');

    Route::resource('gallery',             \App\Http\Controllers\Admin\GalleryController::class);

    Route::get('seo',                       [\App\Http\Controllers\Admin\SeoController::class, 'index'])->name('seo.index');
    Route::post('seo/update/{id}',             [\App\Http\Controllers\Admin\SeoController::class, 'update'])->name('seo.update');
});
