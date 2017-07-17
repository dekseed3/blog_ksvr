@extends('main')

@section('title', '| โรงพยาบาลค่ายกฤษณ์สีวะรา')

@section('content')
        <div class="form-spacing-top-index row">
            <div class="jumbotron text-center">
              <h1>ระบบจัดการข้อมูล</h1>
              <p>โรงพยาบาลค่ายกฤษณ์สีวะรา</p>
              <p><a class="btn btn-primary btn-lg" href="{{ url('/how_to_use') }}" role="button">วิธีใช้งาน</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

                @foreach($posts as $post)

                <div class="post">
                    <h3>{!! $post->title !!}</h3>
                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">อ่านต่อ</a>
                </div>

                <hr>
                @endforeach

            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Side bar</h2>
            </div>
        </div>
@endsection
