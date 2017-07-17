@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}


@endsection

@section('content')

	<div class="form-spacing-top-index row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('title', 'หัวข้อ :') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'required' => '']) }}

				{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
				{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '']) }}

				{{ Form::label('category_id', 'หมวดหมู่ :', ['class' => 'form-spacing-top']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

				{{ Form::label('tags', 'Tags :', ['class' => 'form-spacing-top'])}}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}


				{{ Form::label('body', 'ข้อความ :', ['class' => 'form-spacing-top']) }}
				{{ Form::textarea('body',null, ['class' => 'form-control', 'required' => '']) }}

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
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show', 'ยกเลิก', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
						{{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
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
