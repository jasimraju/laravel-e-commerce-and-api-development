@foreach($metadata['objects']->slider as $slider)
<section class="hero-area">
  <div class="container-fluid">
    <div class="row">
      <div class="hero-area-outer">
        <div class="hero-area-inner">
          <div class="hero-thumb">
            @foreach($slider->image as $image)
              {!!image_compnent($image,'text')!!}
           @endforeach
            <div class="hero-contents">

              <h6 class="hero-subheading">{{$slider->tag_line}}</h6>
              <h2 class="hero-main-heading">{{$slider->title}}</h2>
              <p class="hero-texts">{{$slider->description}}</p>
              <div class="hero-btn-group">
                @foreach($slider->sliderbutton as $button)
                <a href="{{route($button->link->route)}}" class="gradient-style-1 promo-btn">{{$button->title}}</a>
                
                @endforeach
              </div>
            </div>
          </div>
   
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach