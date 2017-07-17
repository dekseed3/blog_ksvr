@extends('main_user')

@section('title', "| โรงพยาบาลค่ายกฤษณ์สีวะรา")
@section('stylesheets')
	<link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
	{!! Html::style('css/style.css') !!}
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')

	<!-- Banner -->
	  <section id="banner">
	    <span class="logo"><img src="{{ asset('images/logo.png') }}" style="margin-bottom:10px;" alt="" width="200px" /></span>
	    <h2><i class="fa fa-files-o" aria-hidden="true" style="color:#18bfef; "></i>&nbsp; ระบบจัดการข้อมูล</h2>
	    <p>แหล่งรวบรวมข้อมูล โรงพยาบาลค่ายกฤษณ์สีวะรา</p>
	  </section>

		<!-- Main -->
			<section id="main" class="container">

				<section class="box special">
					<header class="major">
						<h2>แนะนำ</h2>
						<p>เพื่อความรวดเร็ว สามารถค้นหาหัวข้อต่างๆ ได้</p>
					</header>
					{{ Form::open(array('url' => '', 'files'=> true)) }}
						<div class="row uniform 50%">
							<div class="9u 12u(mobilep)">

								{!! Form::text('search_text', null, array('placeholder' => 'ค้นหาหัวข้อ...','class' => 'seach','id'=>'searchname',
									'style' => 'background-image: url("images/search-icon-png-2.png");background-position: 15px 15px;background-repeat: no-repeat;background-size: 30px 30px;padding:0 0 0 55px;')) !!}

							</div>
							<div class="3u 12u(mobilep)">
								<input type="submit" value="ค้นหา" class="fit special" />
							</div>
						</div>
					{{Form::close()}}
					{{-- <span class="image featured"><img src="images/pic01.jpg" alt="" /></span> --}}
				</section>

	<!-- Featured Post -->

		<section class="box special">
			<header class="major">
					<h2>{{ $first->title }}</h2>
					</header>
						<span class="date">{{ date('M j, Y', strtotime($first->created_at)) }}</span>
					<p>{!! $first->body !!}</p>

				{{-- <a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a> --}}
				<ul class="actions">
					<li><a href="{{ url('blog/'.$first->slug) }}" class="button big">อ่านต่อ</a></li>
				</ul>
			</section>

		<!-- Posts -->
		<div class="row">

				@foreach($rest as $post)
							<div class="6u 12u(narrower)">
								<section class="box special">
									<header class="major">
										<h3>{{ $post->title }}</h3>
										<span class="date">{{ date('M j, Y', strtotime($post->created_at)) }}</span>
									</header>
								{{-- <a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a> --}}
								<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen($post->body) > 250 ? '...' : "" }}</p><ul class="actions">
									<li><a href="{{ url('blog/'.$post->slug) }}" class="button alt">อ่านต่อ</a></li>
								</ul>
								</section>
							</div>
				@endforeach
			</div>

			<ul class="actions vertical">
				<li style="text-align: center;"><a href="{{ url('blog/') }}" class="button big special " ><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; หัวข้อทั้งหมด</a></a></li>
			</ul>

	</section>

			<!-- CTA -->
			<section id="cta">
				<!-- Form -->
				<header class="major">
					<h2>แจ้งปัญหาการใช้งาน</h2>
				</header>

			</section>


			<!-- The Modal -->
		  <div id="myModal" class="modal-add">

		        <div class="modal-content-add">
		          <div class="row">

		            <div class="12u">


		    <div class="modal-body-add">
		      <span class="close">&times;</span>
		    <!-- Form -->
		      <section class="box">

		        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp; เพิ่มข้อมูลใหม่</h3>

		        {!! Form::open(array('route' => 'posts_user.store', 'data-parsley-validate' => '', 'files' => true )) !!}
		          <div class="row uniform 50%">
		            <div class="12u">
		              {{ Form::label('title', 'หัวข้อ :') }}
		              {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'หัวข้อ')) }}
		            </div>
		          </div>
		          <div class="row uniform 50%">
		            <div class="12u">
		              {{ Form::label('category_id', 'หมวดหมู่ :')}}
		              <div class="select-wrapper">
		                <select name="category_id" id="category">
		                  @foreach($categories as $category)
		                  <option value="{{ $category->id }}">{{ $category->name }}</option>
		                  @endforeach
		                </select>
		              </div>
		            </div>
		          </div>
		          <div class="row uniform 50%">
		          <div class="12u">
		            {{ Form::label('tags_id', 'Tags :')}}
		            <div class="select-wrapper">
									<div style="with:100%;">


		            <select class="select2-multi" style="width:100%" name="tags[]" multiple="multiple">
		              @foreach($tags as $tag)
		              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
		              @endforeach
		            </select>
								</div>
		          </div>
		          </div>
		        </div>
		          {{-- <div class="row uniform 50%">
		            <div class="4u 12u(narrower)">
		              <input type="radio" id="priority-low" name="priority" checked>
		              <label for="priority-low">Low Priority</label>
		            </div>
		            <div class="4u 12u(narrower)">
		              <input type="radio" id="priority-normal" name="priority">
		              <label for="priority-normal">Normal Priority</label>
		            </div>
		            <div class="4u 12u(narrower)">
		              <input type="radio" id="priority-high" name="priority">
		              <label for="priority-high">High Priority</label>
		            </div>
		          </div>
		          <div class="row uniform 50%">
		            <div class="6u 12u(narrower)">
		              <input type="checkbox" id="copy" name="copy">
		              <label for="copy">Email me a copy of this message</label>
		            </div>
		            <div class="6u 12u(narrower)">
		              <input type="checkbox" id="human" name="human" checked>
		              <label for="human">I am a human and not a robot</label>
		            </div>
		          </div> --}}
		          <div class="row uniform 50%">
		            <div class="12u">
		              {!! Form::file('files[]', array('multiple'=>true)) !!}
		            </div>
		          </div>
		          <div class="row uniform 50%">
		            <div class="12u">
		              {{ Form::textarea('body', null, array('class' => '','placeholder' => 'รายละเอียด')) }}
		            </div>
		          </div>
		          <div class="row uniform">
		            <div class="12u">
		              <ul class="actions">
		                <li>{{ Form::submit('บันทึกข้อมูล', array('class' => '', 'style' => '')) }}</li>
		                {{-- <li><span class="close">ยกเลิก</span></li> --}}
		              </ul>
		            </div>
		          </div>
		        {!! Form::close() !!}

		      </section>
		</div>
		</div>
		</div>
		</div>
		  </div>
@endsection
@section('javascript')
	{{-- Autocomplete --}}
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script type="text/javascript">

		$("#searchname").autocomplete({
			 source: '{!! URL::route('autocomplete') !!}',
					minlenght:1,
					autoFocus:true,
					select:function(e,ui){
						$('#id').val(ui.item.id);
						$('#searchname').val(ui.item.value);
					}
	});
	</script>
	{{-- End Autocomplete --}}

	{{-- Modal --}}
	<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
	</script>
	{{-- End Modal --}}

	<script src = "{{ URL::to('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
  <script>


    tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
  </script>
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
  $(".select2-multi").select2();
  </script>


@endsection
