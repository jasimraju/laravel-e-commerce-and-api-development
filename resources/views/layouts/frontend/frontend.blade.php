{{-- [website frontend blade] --}}
 @include('layouts.frontend.inc.head')
  @yield('css')
<body>
@include('layouts.frontend.inc.topheader')
@include('layouts.frontend.inc.header')
    @yield('slide_banner')
    @yield('cat_slide')
    @yield('body');
    @include('layouts.frontend.inc.footer')
    @include('layouts.frontend.modal.main_modal')
    @include('layouts.frontend.inc.extrnaljs')
      @include('layouts.frontend.inc.customjs')
      @yield('javascript')


</body>

</html>