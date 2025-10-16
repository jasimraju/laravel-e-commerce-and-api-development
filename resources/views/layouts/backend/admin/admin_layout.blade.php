{{-- [website backend.admin blade] --}}
 @include('layouts.backend.admin.inc.head')
  @yield('css')
<body data-sidebar="dark">
@include('layouts.backend.admin.inc.topheader')
@include('layouts.backend.admin.inc.header')
@include('layouts.backend.admin.inc.left_menu')
    @yield('slide_banner')
    @yield('cat_slide')
    <div id="layout-wrapper">
    @yield('body');
    @include('layouts.backend.admin.inc.footer')
</div>
    @include('layouts.backend.admin.inc.right_menu')
 
    @include('layouts.backend.admin.inc.extrnaljs')
      @include('layouts.backend.admin.inc.customjs')
      @yield('javascript')
  

</body>

</html>