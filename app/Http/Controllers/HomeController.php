<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home', [
            'title' => 'Laravel Home - Your New Application',
            'message' => 'Welcome to your new Laravel application!'
        ]);
    }
}
