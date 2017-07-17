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

class PostController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database

        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // return a view and pass in the above variable

        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|min:5|max:255',
            'category_id' => 'required|integer',
            'body' => 'required'
            ));

          $string =  $request->slug;
          $string = preg_replace("`\[.*\]`U","",$string);
          $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
          $string = str_replace('%', '-percent', $string);
          $string = htmlentities($string, ENT_COMPAT, 'utf-8');
          $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
          $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $string;
        $post->category_id = $request->category_id;
        //$post->body = Purifier::clear($request->body);
        $post->body = $request->body;

        //save image
        if($request->hasFile('files')){

          $post->save();
          // save tags
          $post->tags()->sync($request->tags, false);


          // getting all of the post data
          $files = $request->file('files');

          // Making counting of uploaded images
          $file_count = count($files);
          // start count how many uploaded

          $uploadcount = 0;

          foreach($files as $file) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg,txt,pdf,doc,docx,xls,xlsx'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
              $destinationPath = 'uploads/';
              $filename = time(). '.' . $file->getClientOriginalExtension();
              $upload_success = $file->move($destinationPath, $filename);
              // save into database
              $file_upload = new File_Upload();
              $file_upload->mime = $file->getClientMimeType();
              $file_upload->filename = $filename;
              $file_upload->post_id = $post->id;
              $file_upload->save();

              $uploadcount ++;

            }


          }

          if($uploadcount == $file_count){

            // redirect to another page
            Session::flash('success', 'เพิ่มข้อมูลเรียบร้อย!');
            return redirect()->route('posts.show', $post->id);

          }
          else {

            return redirect()->route('posts.show', $post->id)->withErrors($validator);
          }

        }

        $post->save();

        // save tags
        $post->tags()->sync($request->tags, false);

        // redirect to another page
        Session::flash('success', 'เพิ่มข้อมูลเรียบร้อย!');
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
          $cats[$category->id] = $category->name;

        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;

        }
        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        // Validate the data
        if ($request->input('slug') == $post->slug){
          $this->validate($request, array(
                'title'       => 'required|max:255',
                'category_id' => 'required|integer',
                'body'        => 'required'
          ));

        }else{
          $this->validate($request, array(
                  'title'       => 'required|max:255',
                  'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                  'category_id' => 'required|integer',
                  'body'        => 'required'
              ));
        }

        $string =  $request->slug;
        $string = preg_replace("`\[.*\]`U","",$string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
        $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);

        // Save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $string;
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clear($request->input('body'));

        $post->save();


        if(isset($request->tags)){
          $post->tags()->sync($request->tags);
        } else {
          $post->tags()->sync(array());
        }


        // set flash data with success message
        Session::flash('success', 'เปลี่ยนแปลงข้อมูลเรียบร้อย!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        $post->delete();

        Session::flash('success', 'ลบข้อมูลเรียบร้อย!');

        return redirect()->route('posts.index');
    }
}
