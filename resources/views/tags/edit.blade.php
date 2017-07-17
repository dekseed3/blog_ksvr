@extends('main')

@section('title', "| แก้ไข Tag")

@section('content')

    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}

      {{ Form::label('name', 'ชื่อ Tag:') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}

      {{ Form::submit('บันทึก', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

    {!! Form::close() !!}

@endsection
