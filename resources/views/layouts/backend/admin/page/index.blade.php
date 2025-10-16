@extends('layouts.backend.admin.admin_layout')

@section('css')

@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

          @include('layouts.backend.admin.inner.title',['main_title'=>$main_title])
              <div class="checkout-tabs" id="main-view">
                            <div class="row">
                            	@php
                                $col = '12';
                                @endphp
                            	@isset($sub_menus)
                                <div class="col-lg-2" id="left-side-menu">
                                @include('layouts.backend.admin.inner.inner_left',['sub_menus'=> $sub_menus])	
                                </div>
                                @php
                                $col = '10';
                                @endphp
                                @endisset
                               
                                <div class="col-lg-{{$col}}" id="main-sub-view">
                               @include($main_view_port,['sub_title'=>$sub_title])
                                </div>
                            </div>
                        </div>    

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


          </div>
    <!-- end main content-->
@endsection

@section('javascript')
@isset($sub_menus)
<script type="text/javascript">
    $(document).ready(function() {
        console.log('hellosdfsfsf');
    var i=1;
    $('.sub-left-menu').each(function(){
        if(i == 1){
            $(this).trigger( "click" );
        }
          $i++;  
        });

 
    
});

</script>

@endisset
@endsection
