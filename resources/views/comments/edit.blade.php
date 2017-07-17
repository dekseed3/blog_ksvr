@extends('main')

@section('title', '| Edit Comment')

@section('content')

<div class="row">
<div class="col-md-8 col-md-offset-2">


  <h1>แก้ไข ความคิดเห็น</h1>


{{ Form::model($comment, ['route' => ['comments.update_admin', $comment->id], 'method' => 'PUT' ]) }}

    {{ Form::label('name') }}
    {{ Form::text('name', $comment->author->name, ['class' => 'form-control', 'disabled' => '']) }}

    {{ Form::label('comment', 'Comment:') }}
    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

    {{ Form::submit('บันทึก', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top:15px']) }}

  {{ Form::close() }}

  </div>

</div>
@endsection
