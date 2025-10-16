<div class="row row_flash_sale">
            
            <div class="col-md-3 px-0">
              <h2 class="flash-sale mb-0">Flash Sale</h2>
            </div>
            <div class="col-md-9 py-0">

            
          <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="all_flash_product"  href="javascript:void(0)" onclick="showview(this)" data-url="{{route('shoping.flashproduct')}}" data-viewport="{{$page_id}}" >All</a>
            </li>
            @foreach($categorylist as $category)
            <li class="nav-item">
              <a class="nav-link"  href="javascript:void(0)" onclick="showview(this)" data-url="{{route('shoping.flashproduct',$category->id)}}" data-viewport="{{$page_id}}">@lang($category->language_file_name.'.'.$category->name)</a>
            </li>
           @endforeach
                                                             
          </ul>
        </div>
      </div>