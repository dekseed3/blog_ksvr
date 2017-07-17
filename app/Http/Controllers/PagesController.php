<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

	public function __construct()
	{
			$this->middleware('auth');
	}
	
		public function getIndex(){
			/*
			process variable data or params
			talk to the model
			recieve from the model
			compile or process data from the model if needed
			pass that data to the correct view

			*/

			return view('pages.welcome');

		}

		public function getHomepage(){

			$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
			return view('pages.home')->withPosts($posts);

		}

		public function getHowtouse(){

			return view('pages.how_to_use');

		}

		public function getContact(){

			return view('pages.contact');

		}

		public function postContact(){


		}
}
