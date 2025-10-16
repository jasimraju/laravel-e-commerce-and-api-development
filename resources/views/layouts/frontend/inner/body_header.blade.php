<div class="row row_flash_sale">
            
           @isset($title) <div class="col-md-3 px-0">
              <h2 class="flash-sale mb-0">{{$title}}</h2>
            </div>
            @endisset
            <div class="col-md-9 py-0">

            
          <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
            @if(!empty($list))
            @foreach($lists as $list)
            <li class="nav-item">
              <a class="nav-link active" id="All" data-toggle="tab" href="#All" role="tab" aria-controls="All" aria-selected="true">All</a>
            </li>
            @endforeach
          
                @endif                                             
          </ul>
        </div>
      </div>