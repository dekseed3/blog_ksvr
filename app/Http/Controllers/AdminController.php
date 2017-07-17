<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
             //$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
             //return view('pages.home')->withPosts($posts);
            return view('admin');
    }
}
