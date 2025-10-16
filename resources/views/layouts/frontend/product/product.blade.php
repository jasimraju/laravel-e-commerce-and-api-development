
 <div class="tab-section-inner">
       @if(Route::is('homepage') )
               @include('layouts.frontend.product.product_header')
               @else
               @include('layouts.frontend.product.product_other_header')
               @endif
        
              	       @include('layouts.frontend.product.product_view')
           

      </div>
