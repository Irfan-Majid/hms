<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class FrontEnd extends Controller
{
    //
    public function index()
    {
        $deps=Department::all();
        return view('frontend.index',compact('deps'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function doctors()
    {
        return view('frontend.doctor');
    }
    public function department()
    {
        return view('frontend.department');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function blog_detail()
    {
        return view('frontend.blog_details');
    }
    public function element()
    {
        return view('frontend..elements');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
