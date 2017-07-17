@extends('main')

@section('title', '| Tags')

@section('content')
  <div class="row">
      <div class="col-md-8">
        <h1>Tags</h1>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อ Tags</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($tags as $tag)
            <tr>
              <th>{{ $tag->id }}</th>
              <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-3">
        <div class="well">
          {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
            <h2>เพิ่ม Tag</h2>
            {{ Form::label('name', 'ชื่อ Tag :') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('เพิ่ม Tag ใหม่', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
          {!! Form::close() !!}

        </div>

      </div>
  </div>
@endsection