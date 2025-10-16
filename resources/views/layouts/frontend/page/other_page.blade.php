@extends('layouts.frontend.frontend')

@section('css')

@endsection

@section('slide_banner')
@include($banner_view)
@endsection
@isset($category_view)
@section('cat_slide')
@include($category_view)
@endsection
@endisset

@section('body')
<section class="main-tab-section mt-5">
  <div class="container">
    <div class="row" id="main-container">
  	@isset($weeklydeals)
        <!-- left side -->
      @include('layouts.frontend.inner.left_side')
      <!-- end left side  -->
       <!-- end col-3 -->
     <!-- start product list -->
      <div class="col-md-9 pr-0">
      	    @endisset
               
          
              	       @include($main_page)
    @isset($weeklydeals)      
</div>
@endisset
      
     <!-- end product lis -->
    
  </div>
  </div>
</section>
@isset($uper_footer)
@include($uper_footer)
@endisset
@endsection

