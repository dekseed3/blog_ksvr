<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use App\Tag;
use Purifier;
use Validator;
use App\File_Upload;
use Jenssegers\Agent\Agent;

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

            $posts = Post::orderBy('created_at', 'desc')->paginate(7);
        		$firstItem = $posts->shift();

            $categories = Category::all();
            $tags = Tag::all();

            $agent = new Agent();
        		// return a view and pass in the above variable
        		return view('pages.index', compact('agent'))->with(['rest' => $posts, 'first' => $firstItem])
            ->withCategories($categories)
            ->withTags($tags);

        }

        public function getHowtouse(){

            return view('pages.how_to_use');

        }

        public function getContact(){

            return view('pages.contact');

        }

        public function autocomplete(Request $request) {

              $term = $request->term;
              $data = Post::where('title','LIKE','%'.$term.'%')->take(7)->get();

              $results = array();

                foreach($data as $key=>$v ) {
                    $results[] = ['id'=>$v->id,'value' => $v->title];
                  }

                return response()->json($results);

    }



}
