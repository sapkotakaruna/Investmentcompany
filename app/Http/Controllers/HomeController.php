<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Admin\BaseController;
use App\Models\ContactForm;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = 'admin.dashboard';
    protected $view_path = 'admin.dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 $data['contact'] = ContactForm::get();
        //        return view('home');
        //comment
        return view($this->loadCommonDataToView('admin.home'), compact('data'));
    }

    // public function ContactDestroy($id)
    // {
    //     $row = ContactForm::find($id);
    //     parent::rowExist($row);
    //     //remove old photo

    //     $row->delete();
    //     return back()->with('success_message',  'Contact  deleted Successfully');
    // }

}
