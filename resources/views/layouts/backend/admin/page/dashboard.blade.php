
@extends('layouts.backend.admin.admin_layout')

@section('css')

@endsection


<!-- Begin page -->



@section('body')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

          @include('layouts.backend.admin.inner.title')
             @include('layouts.backend.admin.inner.body')     

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


          </div>
    <!-- end main content-->
@endsection

