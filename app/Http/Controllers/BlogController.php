<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\File_Upload;
use App\Category;
use Session;
use App\Tag;
use Purifier;
use Validator;
use Jenssegers\Agent\Agent;

class BlogController extends Controller
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
	public function getIndex(){

		$posts = Post::paginate(10);

		return view('blog.index')->withPosts($posts);

	}

    public function getSingle($slug){
    	// fetch from the DB base on slug
    	$post = Post::where('slug', '=', $slug)->first();

			$categories = Category::all();
			$tags = Tag::all();

			$file_upload = $post->file_uploads;

			$comment = $post->comments;
			$agent = new Agent();
    	return view('blog.single', compact('agent'))->withPost($post)->withComment($comment)->withFile_upload($file_upload)->withCategories($categories)->withTags($tags);

    }


}
