@extends('main_user')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| แก้ไขโพสต์ '$titleTag'")

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}


@endsection

@section('content')
  <div class="row">
    <div class="12u">
  <section id="main" class="container">
    <header>
      <h2><i class="fa fa-file-text-o" aria-hidden="true" style="color:#18bfef;"></i>&nbsp;&nbsp; แก้ไขข้อมูล</h2>
      <p>A generic page for every non-generic situation.</p>
    </header>
    <div class="box">

		{!! Form::model($post, ['route' => ['posts_user.update', $post->id], 'method' => 'PUT', 'files' => true ]) !!}
    <div class="row uniform 50%">
      <div class="12u">
				{{ Form::label('title', 'หัวข้อ :') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'required' => '']) }}
      </div>
      </div>
      <div class="row uniform 50%">
      <div class="12u">
				{{ Form::label('category_id', 'หมวดหมู่ :', ['class' => 'form-spacing-top']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        <div class="row uniform 50%">
        <div class="12u">
				{{ Form::label('tags', 'Tags :', ['class' => 'form-spacing-top'])}}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'style' => 'width:100%', 'multiple' => 'multiple']) }}
      </div>
      <div class="row uniform 50%">
      <div class="12u">
        {{ Form::label('filename', 'อัพโหลดไฟล์', ['class' => 'form-spacing-top'])}}
        {!! Form::file('files[]', array('multiple'=>true)) !!}
      </div>
    </div>
      </div>
      <div class="row uniform 50%">
      <div class="12u">

				{{ Form::label('body', 'ข้อความ :', ['class' => 'form-spacing-top']) }}
				{{ Form::textarea('body',null, ['class' => 'form-control', 'required' => '']) }}

			</div>
</div>
<div class="row uniform 50%">
  <div class="12u">
    @foreach($file_upload as $file_uploads)
      <a href="{{ asset('uploads/'. $file_uploads->filename) }}">{!! $file_uploads->filename !!}</a>
    @endforeach
    {!! Form::file('files[]', array('multiple'=>true)) !!}
  </div>
</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>โพสเมื่อวันที่</dt>
						<dd>{{ date('D, d M Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>ปรับปรุงเมื่อวันที่</dt>
						<dd>{{ date('D, d M Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
				<hr>
        <div class="row uniform">
          <div class="12u">
            <ul class="actions">
							<li>{!! Html::linkRoute('blog.single', 'ยกเลิก', array($post->slug), array('class' => 'btn btn-danger btn-block')) !!}</li>

						<li>{{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-success btn-block']) }}</li>
          </ul>
        </div>
      </div>
		{!! Form::close() !!}
	</div>

  </section>
  </div>
  </div>
@stop

@section('scripts')
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
