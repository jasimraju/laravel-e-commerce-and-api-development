{{-- [website frontend blade] --}}
 @include('layouts.frontend.inc.head')
  @yield('css')
<body>

  
    @yield('body')
   
    @include('layouts.frontend.inc.extrnaljs')
      @include('layouts.frontend.inc.customjs')
      @yield('javascript')
  

</body>

</html>