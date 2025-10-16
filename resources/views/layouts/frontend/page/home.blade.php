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
<section class="main-tab-section">
  <div class="container">
    <div class="row">
      <!-- left side -->
      @include('layouts.frontend.inner.left_side')
      <!-- end left side  -->
       <!-- end col-3 -->
     <!-- start product list -->
      <div class="col-md-9 pr-0">
      	  <div class="tab-section-inner">
       
               @include('layouts.frontend.product.product_header')
          
              	       @include('layouts.frontend.product.product_view')
          

      </div>
      </div>
     <!-- end product lis -->
    
  </div>
  </div>
</section>
@isset($uper_footer)
@include($uper_footer)
@endisset
@endsection
