<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            return redirect('login');
        } else {
            return view('website/newhome');
        }        
    }

    public function about()
    {
        return view('website/about');
    }
    
    public function benefit()
    {
        return view('website/benefit');
    }
    
    public function contact()
    {
        return view('website/contact');
    }
    
}
