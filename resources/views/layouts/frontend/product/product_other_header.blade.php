<div class="row row_flash_sale">
            
            <div class="col-md-3 px-0">
              <h2 class="flash-sale mb-0">{{$title_page}}</h2>
            </div>
            <div class="col-md-9 py-0">

            
          <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
            <li class="nav-item">
              @if(!empty($cat_id))
           
          <span class="filter-title arrow-down" data-url="{{route('product.show_filler',$cat_id)}}"  onclick="showview(this)" data-viewport="showfiller_view"  style="cursor: pointer;">Search <i class="fa fa-sort-amount-down" ></i></span>

          @else
          <span class="filter-title arrow-down" data-url="{{route('product.show_filler')}}"  onclick="showview(this)" data-viewport="showfiller_view"  style="cursor: pointer;">Search <i class="fa fa-sort-amount-down" ></i></span>
          @endif
            </li>
             
           
                                                             
          </ul>
        </div>
      </div>
      @include('layouts.frontend.product.inc.fillerview')