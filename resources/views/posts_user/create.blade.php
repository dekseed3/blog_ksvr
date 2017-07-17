@extends('main_user')

@section('title', '| เพิ่มข้อมูลใหม่')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}


{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=54ilkov601frakjuzznjvobnb79yp4zw1of88chiqpn3yt9s"></script> --}}



@endsection

@section('content')
  <div class="row">
    <div class="12u">
  <section id="main" class="container">
    <header>
      <h2><i class="fa fa-file-text-o" aria-hidden="true" style="color:#18bfef;"></i>&nbsp;&nbsp; เพิ่มข้อมูลใหม่</h2>
      <p>A generic page for every non-generic situation.</p>
    </header>
    <div class="box">

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
    <select class="select2-multi" style="width:100%"  name="tags[]" multiple="multiple"  data-select-search="true" >
      @foreach($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
    </select>
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
        <li><input type="reset" value="Reset" class="alt" /></li>
      </ul>
    </div>
  </div>
  {!! Form::close() !!}



  </div>
</section>
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
