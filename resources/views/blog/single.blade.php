@extends('main_user')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('stylesheets')

  {!! Html::style('css/style.css') !!}



@endsection

@section('content')
  <!-- Main -->
    <section id="main" class="container">
      <header>
        <h2><i class="fa fa-files-o" aria-hidden="true" style="color:#18bfef; "></i>&nbsp; {{ $post->title }}</h2>
      </header>
      <div class="row">
        <div class="12u">

          <div class="box">
        {{-- <span class="image featured"><img src="images/pic01.jpg" alt="" /></span> --}}
        @if(($post->author->id) == (Auth::user()->id))
          <div class="dropdown">

            <a onclick="settingbtnFunction()" class="settingdropbtn icon fa-angle-down"></a>
            <div id="settingDropdown" class="settingdropdown-content">
              <a href="{{ route('posts_user.edit', $post->id) }}">แก้ไขข้อมูล</a>
              {!! Form::open(['route' => ['posts_user.destroy', $post->id], 'method' => 'DELETE', 'id' => 'delete', 'name' => 'delete', 'style' => 'margin: 0px;']) !!}
              <a href="javascript:document.delete.submit()" class="" onClick="return window.confirm('คุณต้องการลบข้อมุลนี้ ใช่หรือไหม?');">ลบข้อมูล</a>
              {!! Form::close() !!}
            </div>

          </div>
        @endif
            <header>
              <h3><strong>{{ $post->title }}</strong></h3>
              <header>
                <h4></h4>
                <p>สร้างโดย &nbsp; <a href="{{ route('user.profile', $post->author->id) }}">{{ $post->author->name }}</a>&nbsp; เมื่อวันที่ &nbsp;{{ date('d M Y เวลา h:ia', strtotime($post->created_at)) }}</p>
              </header>

            </header>
              <p>{!! $post->body !!}</p>
            <header>
              <h4></h4>
              <p>เกี่ยวกับ : {{ $post->category->name }}</p>
            </header>

            @foreach ($post->tags as $tag)

              <span class="chip">{{ $tag->name }}</span>

            @endforeach

              <p>
    					@foreach($file_upload as $file_uploads)
    						<a href="{{ asset('uploads/'. $file_uploads->filename) }}">{!! $file_uploads->filename !!}</a>
    					@endforeach

    				</p>
          {{-- <div class="row">
              <div class="6u 12u(mobilep)">
                <h3>And now a subheading</h3>
                <p>Adipiscing faucibus nunc placerat. Tempus adipiscing turpis non blandit accumsan eget lacinia nunc integer interdum amet aliquam ut orci non col ut ut praesent. Semper amet interdum mi. Phasellus enim laoreet ac ac commodo faucibus faucibus. Curae lorem ipsum adipiscing ac. Vivamus ornare laoreet odio vis praesent.</p>
              </div>
              <div class="6u 12u(mobilep)">
                <h3>And another subheading</h3>
                <p>Adipiscing faucibus nunc placerat. Tempus adipiscing turpis non blandit accumsan eget lacinia nunc integer interdum amet aliquam ut orci non col ut ut praesent. Semper amet interdum mi. Phasellus enim laoreet ac ac commodo faucibus faucibus. Curae lorem ipsum adipiscing ac. Vivamus ornare laoreet odio vis praesent.</p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>

      <header>
        <h3 style="margin-left:25px; margin-bottom:10px; margin-top:10px;"><strong><i class="fa fa-comments" aria-hidden="true"></i>
          <span style="">ความคิดเห็น ( {{ $post->comments()->count() }} )</span></strong></h3>

      </header>

        <div class="12u">
          <section class="box">
          				<form action="{{ route('comments.store', $post->id) }}" method="POST" enctype="multipart/form-data">
          				  <div class="row uniform 50%">
                      <div class="6u 12u$(xsmall)">
          					       <input type="hidden" name="_token" value="{{ csrf_token() }}">
          					       <input type="hidden" name="on_post" value="{{ $post->id }}">
          					       <input type="hidden" name="slug" value="{{ $post->slug }}">
            							<img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="img-author">
            							<h4 class="author-name"><strong>{{ Auth::user()->name }}</strong></h4>
            					</div>
                    </div>
                      <div class="row uniform">
            					<div class="12u$">
            							<textarea name="body" rows="3" class="form-control" placeholder="เขียนความคิดเห็น..." ></textarea>

                      </div>
                    </div>
                    <div class="row uniform">
                      <div class="12u">
                        <ul class="actions">
              							<li>{!! Form::file('files[]', array('multiple'=>true)) !!}</li>
              							<li style="float:right;"><input type="submit" value="ส่งความคิดเห็น" /></li>
              					</ul>
            					</div>
          					</div>
          				</form>

          					@foreach($comment as $comments)

                      <div class="boxborder">
                        @if(($comments->author->id) == (Auth::user()->id))
                          <div class="dropdown">
                            <a onclick="dropbtnFunction()" class="dropbtn icon fa-angle-down"></a>
                            <div id="myDropdown" class="dropdown-content">
                              <a href="#">แก้ไขโพสต์</a>
                              <a href="#">ลบ</a>
                            </div>

                          </div>
                        @endif
                        <div class="author-info">
          								<a href="{{ route('user.profile', $comments->author->id) }}"><img src="/uploads/avatars/{{ $comments->author->avatar }}" class="img-author img-circle"></a>
          									<div class="author-name">
          											<h4><a href="{{ route('user.profile', $comments->author->id) }}"><strong>{{ $comments->author->name }}</strong></a></h4>
          													<div class="author-created_at">
          															{{ $comments->created_at->format('F nS,Y \a\t h:i a') }}
          													</div>
          									</div>
          							</div>
          							<div class="comment-content">
          								<p>{{ $comments->comment }}</p>
          							</div>
                      </div>

          					@endforeach

                  </section>
              </div>
            </div>
      </section>
	@endsection
	@section('scripts')
  {!! Html::script('assets/user/js/style.js') !!}
	@endsection
