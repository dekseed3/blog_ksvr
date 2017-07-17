<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Image;
use Session;

class CommentsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /*
        * View data
        */
       public function view(Request $request)
       {
           if($request->ajax()){
               $id = $request->id;
               $info = Comment::find($id);
               //echo json_decode($info);
               return response()->json($info);
           }
       }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
      //dd($post);
            $post = Post::find($post_id);


            $comment = new Comment();

            $this->validate($request, array('body' => 'required'));

            $comment->from_user = $request->user()->id;
            $comment->post_id = $request->on_post;
            $comment->comment = $request->body;
            $slug = $request->slug;
            $comment->approved = true;
            $comment->post()->associate($post);
            //save images
            if($request->hasFile('featured_image')){
              $images = $request->file('featured_image');
              $filename = time() . '.' . $images->getClientOriginalExtension();
              $location = public_path('images/'. $filename);
              Image::make($images)->save($location);

              $comment->images = $filename;
            }else {
              $comment->images = $slug;
            }

            $comment->save();

            Session::flash('success','Comment was added.');
            return redirect()->route('blog.single', [$post->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, $id)
    {

          $comment = Comment::find($id);

          $this->validate($request, array('comment' => 'required'));


          $comment->comment = $request->comment;

          //save images
          if($request->hasFile('featured_image')){
            $images = $request->file('featured_image');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($images)->save($location);

            $comment->images = $filename;
          }else {
            $comment->images = '';
          }

          //dd($data);
          //
         $comment->save();
         Session::flash('success', 'แก้ไข ความคิดเห็น เรียบร้อย!');
         return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comment = Comment::find($id);
      $post_id = $comment->post->id;
      $comment -> delete();

      Session::flash('success', 'ลบ ความคิดเห็น เรียบร้อย!');
      return redirect()->route('posts.show', $post_id);
    }

}
