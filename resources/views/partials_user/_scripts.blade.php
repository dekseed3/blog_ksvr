<!-- Scripts -->
  <script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/user/js/jquery.dropotron.min.js') }}"></script>
  <script src="{{ asset('assets/user/js/jquery.scrollgress.min.js') }}"></script>
  <script src="{{ asset('assets/user/js/skel.min.js') }}"></script>
  <script src="{{ asset('assets/user/js/util.js') }}"></script>
  <script src="{{ asset('assets/user/js/main.js') }}"></script>
    <script type="text/javascript">
    $("#upload").click(function(){
            $("#upload-file").trigger('click');
        });


    </script>

    <script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 2000);
    }

    function showPage() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("myDivv").style.display = "block";
    }
    </script>

@yield('javascript')
