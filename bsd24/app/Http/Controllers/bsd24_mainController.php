<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bsd24_mainController extends Controller
{
    function bsd24_home_page()
    {
        return view('main_home_page');
    }
    function login()
    {
        return view('bsd24_login');
    }
    function sign_up()
    {
        return view('bsd24_signup');
    }
    function contact_us()
    {
        return view('bsd24_contact');
    }
    function reviews()
    {
        return view('bsd24_reviews');
    }
    
}
