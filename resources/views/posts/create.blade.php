@extends('main')

@section('title', '| เพิ่มข้อมูลใหม่')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}


{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=54ilkov601frakjuzznjvobnb79yp4zw1of88chiqpn3yt9s"></script> --}}



@endsection

@section('content')

    <div class="form-spacing-top-index row">
        <div class="col-md-8 col-md-offset-2">
        <h1>เพิ่มข้อมูลใหม่</h1>
          <hr>

        {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true )) !!}

          {{ Form::label('title', 'หัวข้อ :') }}
          {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}

          {{ Form::label('slug', 'Slug :')}}
          {{ Form::text('slug', null, array('class' => 'form-control', 'required' =>'', 'minlength' => '5', 'maxlength' => '255') ) }}

          {{ Form::label('category_id', 'หมวดหมู่ :')}}
          <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>

          {{ Form::label('tags_id', 'Tags :')}}
  				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
  					@foreach($tags as $tag)
  					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
  					@endforeach
  				</select>

          {{ Form::label('featured_image', 'อัพโหลดไฟล์')}}

          {!! Form::file('files[]', array('multiple'=>true)) !!}

          {{ Form::label('body', 'ข้อความ :') }}
          {{ Form::textarea('body', null, array('class' => 'form-control')) }}

          {{ Form::submit('บันทึกข้อมูล', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

        {!! Form::close() !!}

        </div>
    </div>

@endsection

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
