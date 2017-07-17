<!DOCTYPE HTML>
<html lang="en">
  <head>

  @include('partials_user._head')

  @yield('stylesheets')

  </head>

    @if (request()->is('home'))

      <body class="landing" onload="myFunction()" style="margin:0;">
        <div id="loader"></div>

    @else

      <body onload="myFunction()" style="margin:0;">
        <div id="loader"></div>
    @endif



    <div id="page-wrapper">
  <div style="display:none;" id="myDivv" class="animate-bottom">
		<div id="page-wrapper">

        @include('partials_user._navbar')

      	@include('partials_user._messages')


              @yield('content')


              @include('partials_user._footer')

        </div> <!-- end of wrapper -->

      @include('partials_user._scripts')
      @yield('scripts')
  </body>
</html>
