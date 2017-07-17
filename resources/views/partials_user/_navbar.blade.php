
<!-- Header -->
@if (request()->is('home'))
  <header id="header" class="alt">
  @else
    <header id="header">
@endif

    <h1><a href="{{ url('/home') }}"><i class="fa fa-files-o" aria-hidden="true" style="color:#18bfef; "></i>&nbsp; ระบบการจัดการข้อมูล</a> โรงพยาบาลค่ายกฤษณ์สีวะรา</h1>
    <nav id="nav">
      <ul>
        <li class="{{ Request::is('home') ? "active" : "" }}"><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; หน้าแรก</a></li>
        <li class="{{ Request::is('how_to_use') ? "active" : "" }}"><a href="{{ url('/how_to_use') }}"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; วิธีใช้งาน</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; แจ้งปัญหา</a></li>
        <li>
          <a href="#" class="icon fa-angle-down"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; ระบบ</a>
          <ul>
            <li class="{{ Request::is('home') ? "active" : "" }}"><a href="{{ url('/home') }}"><i class="fa fa-files-o" aria-hidden="true" style=" "></i>&nbsp; ระบบจัดการข้อมูล</a></li>
            <li><a href="#"><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp; ระบบบันทึกข้อมูลความเสี่ยง</a></li>
          </ul>
        </li>
        <li><a href="#" style="position:relative; padding-left:50px;">
          <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:3px; left:10px; border-radius:50%; margin-right:25px;" />
          {{ Auth::user()->name }}</a>
        <ul>
{{-- <li><a href="{{ route('posts_user.create') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp; เพิ่มข้อมูล</a></li> --}}
        @if ((Auth::user()->status) != "user")

          @if($agent->isPhone())
            <li {{ Request::is('/posts_user/create') ? "active" : "" }}><a href="{{ route('posts_user.create') }}" ><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp; เพิ่มข้อมูล</a></li>
          @endif
          @if (request()->is('home'))
            <li><a href="#" id="myBtn"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp; เพิ่มข้อมูล</a></li>

          @else
            <li {{ Request::is('/posts_user/create') ? "active" : "" }}><a href="{{ route('posts_user.create') }}" ><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp; เพิ่มข้อมูล</a></li>
            
          @endif

      @endif


          <li><a href="{{ route('user.profile', Auth::user()->id) }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; ข้อมูลส่วนตัว</a></li>
          <li><a href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; ออกจากระบบ</a></li>
      </ul>
    </li>
  </ul>
    </nav>
  </header>
