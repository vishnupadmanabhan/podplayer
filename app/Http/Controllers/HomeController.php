<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the profile of user
     * 
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profile.index');
    }

    /**
     * Show the profile of user
     * 
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('profile.search');
    }
}
