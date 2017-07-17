@extends('main_user')

@section('title', "| ข้อมูลส่วนตัว - $users->name")

@section('content')
  <!-- Main -->
    <section id="main" class="container">
      <header>
        <h2>ข้อมูลส่วนตัว</h2>
      </header>
      <div class="box">
        <img src="/uploads/avatars/{{ $users->avatar }}" style="width:150px; height:150px; float:right; border-radius:50%; margin-right:25px;" />
        {{-- <span class="image featured"><img src="images/pic01.jpg" alt="" /></span> --}}
        <h3><strong>{{ $users->rank }} {{ $users->name }}</strong></h3>

        <p>
          <strong>ตำแหน่ง</strong> {{ $users->position }}<br />
          <strong>แผนก</strong> {{ $users->department->name }}<br />

        </p>



      </div>
    </section>


  @endsection
