<section class="shop-by-cat">
<div class="container">
    <div class="row">
             <div class="col-md-6">
              <h2 class="by-cat-heading">Shop By <span>Categories</span></h2>
            </div>
            <div class="col-md-6">
              <a href="{{route('shoping.producd.all')}}" class="show-all-btn">Show All Products <i class="fas fa-arrow-right"></i></a>
            </div>
     </div>
  <div class="row">
    <div class="col-md-12">
      <div class="shop-by-cat-slider-outer">
      <div class="shop-by-cat-slider">

                   @foreach($categorylist as $category)
                <div class="items">
                  <a class="h-cate" href="{{route('shoping.producd.all',$category->id)}}">
                    <div class="cat-bg" style="background-color:{{$category->bg_color}}"></div>
                      <div class="c-img">
                            @foreach($category->image as $image)                
                                                              {!!image_compnent($image,'img-fluid')!!}                         
                                                              
                                                               @endforeach
                       </div>
                     <span class="cat-num">  @lang($category->language_file_name.'.'.$category->name) </span>
                    </a>
                  </div>
                  @endforeach
                </div>
    </div>

  </div>
  </div>
</div>
</section>