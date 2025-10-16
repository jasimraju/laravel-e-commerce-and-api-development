 <!-- banner side inner page -->
 @if(isset($metadata['objects']->slider) && $metadata['objects']->slider->count() >= 1) 
 @foreach($metadata['objects']->slider as $slider)
<section class="section-tb-padding">
  <div class="container">
    <div class="row">

      <div class="grid-list-banner"         @foreach($slider->image as $image)            
             
           style="background-image: url({{asset('public/storage'.$image->folder_location.'/'.$image->name)}});" @endforeach >
        <div class="grid-banner-content">

            <h4>@foreach($slider->sliderbutton as $button)<a href="{{route($button->link->route)}}">{{$button->title}}</a>@endforeach <span class="breadcrumb-sep">/</span> {{$title_page}}</h4>
         </div>
    </div>
    </div>
     
  </div>
</section>
@endforeach
@else
<section class="section-tb-padding">
  <div class="container">
    <div class="row">
      <div class="grid-list-banner" style="background-image: url({{asset('images/slider17.jpg')}});">
        <div class="grid-banner-content">
            <h4><a href="{{route('homepage')}}">@lang('title.home')</a> <span class="breadcrumb-sep">/</span> {{$title_page}}</h4>
         </div>
    </div>
    </div>
     
  </div>
</section>
@endif
<!-- end banner side  -->