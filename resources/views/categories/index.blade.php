@extends('main')

@section('title', '| หมวดหมู่')

@section('content')
  <div class="form-spacing-top-index row">
      <div class="col-md-8">
        <h1>หมวดหมู่</h1>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อหมวดหมู่</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($categories as $category)
            <tr>
              <th>{{ $category->id }}</th>
              <td>{{ $category->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-3">
        <div class="well">
          {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
            <h2>เพิ่มหมวดหมู่</h2>
            {{ Form::label('name', 'ชื่อหมวดหมู่:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('เพิ่มหมวดหมู่ใหม่', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
          {!! Form::close() !!}

        </div>

      </div>
  </div>
@endsection
