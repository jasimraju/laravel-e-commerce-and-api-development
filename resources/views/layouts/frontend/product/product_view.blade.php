


@php
if(!empty($final_cart)) {
$cart_var = $final_cart->pluck('varient_id_value')->toArray();
}
else{
  $cart_var = array();
}
if(!empty($wishlist)) {
$wish_var = $wishlist->pluck('object_id')->toArray();
}
else{
  $wish_var = array();
}

@endphp

<div class="tab-content" id="{{$page_id}}" >
  @if($page_id == 'allproduclist')
  @if(!empty($cat_id))
  @php
  $url = route('shoping.producd.all',$cat_id);
  @endphp
  @else
  @php 
    $url = route('shoping.producd.all');
  @endphp
  @endif
      <span class="d-none" id="appendajaxview" data-url="{{$url}}"  data-viewport="product_ajax" data-loaded-page="{{$loadPagnation}}" data-total-page="{{$totalnumberpage}}"  ></span>
  @endif
            <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All">
              <div class="products-wrapper">
              <div class="products-col-outer" id="product_ajax">
                @if(!empty($products))
              @foreach($products as $product)

<div class="products-col-inner">
  @if(!empty($product['discount_parcentage']) && !empty($product['discount']) )
   <span class="sale-badge gradient-style-2">-{{$product['discount_parcentage']}}%</span> 
     @php
     $product['price'] = $product['price'] - $product['discount'];
     @endphp
     @endif
      <div class="product-thumb">
    
        <img alt="" src="{{$product['image_url']}}" class="product_image"/>
      </div>
      <div class="product-bottom-info">
        <ul class="list-unstyled category-list">
          <li><a href="#">{{$product['brand_name']}}</a></li>
        </ul>
        <h2 class="product-title"><a href="#">{{$product['name']}}</a></h2>
        <div class="product-price  text-center">
          <span class="regular-price"> {{$product['currency_sign']}}{{$product['price']}}  </span>
          @if(!empty($product['discount_parcentage']) && !empty($product['discount']) )
          <span class="discount-price">  {{$product['currency_sign']}}{{$product['price']+$product['discount']}} </span>
          @endif
        </div>
      </div>
      <div class="product-action-buttons  text-center">
        @php 
          $p_uniqe_id = $product['product_id'].'_'.$product['varient_id'].'_'.$product['supplier_id'];
          $w_uniqe_id = $product['product_id'].'_'.$product['varient_id'];
          $p_varient_id = $product['varient_id'];
          @endphp
        <ul class="list-unstyled mb-0">
          <li class="action-wishlist">
            <a href="javascript:void(0)" id="product-list-love-{{$p_uniqe_id}}" data-deal-id="#deal-list-love-{{$p_uniqe_id}}" @if(in_array($p_varient_id,$wish_var)) class="primary_active text-white" @endif data-url="{{route('shoping.wishlist.add',$w_uniqe_id)}}" onclick="showview(this)" data-viewport="mini-wishlist-card"  data-shoping-cart="#wishlist-count-item"  data-shoping-class="primary_active" data-alert-type="success" data-alert-text="@lang('message.wish_added_successfully')" data-alert-timer="2000" >
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 477.534 477.534" style="enable-background:new 0 0 477.534 477.534;" xml:space="preserve">
               <path d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909
                 l-8.431-8.909C181.284,5.762,98.662,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778
                 c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654
                 c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z M413.787,234.226h-0.017
                 L238.802,418.768L63.818,234.226c-39.78-42.916-39.78-109.233,0-152.149c36.125-39.154,97.152-41.609,136.306-5.484
                 c1.901,1.754,3.73,3.583,5.484,5.484l20.804,21.948c6.856,6.812,17.925,6.812,24.781,0l20.804-21.931
                 c36.125-39.154,97.152-41.609,136.306-5.484c1.901,1.754,3.73,3.583,5.484,5.484C453.913,125.078,454.207,191.516,413.787,234.226
                 z"/>
           </svg>
          </a>
        </li>


        <li class="action-cart">
          
          <a href="javascript:void(0)" id="product-list-cart-{{$p_uniqe_id}}" data-deal-id="#deal-list-cart-{{$p_uniqe_id}}" @if(in_array($p_varient_id,$cart_var)) class="primary_active text-white" @endif data-url="{{route('shoping.cart.add',$p_uniqe_id)}}" onclick="showview(this)" data-viewport="mini-shoping-card"  data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total" data-shoping-class="primary_active" data-alert-type="success" data-alert-text="@lang('message.product_added_to_cart_successfully')" data-alert-timer="2000">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">

                <path d="M443.188,442.208L415.956,142.56c-0.768-8.256-7.68-14.56-15.968-14.56h-48V96c0-25.728-9.952-49.888-28.032-67.968
                  C305.876,9.952,281.716,0,255.988,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.82,442.208
                  c-1.632,17.856,4.384,35.712,16.48,48.96S114.612,512,132.564,512h246.88c17.952,0,35.168-7.584,47.264-20.832
                  S444.788,460.064,443.188,442.208z M191.988,96c0-35.296,28.704-64,64-64c17.184,0,33.28,6.624,45.344,18.656
                  c12.064,12.032,18.656,28.16,18.656,45.344v32h-128V96z M403.06,469.6c-6.144,6.688-14.528,10.4-23.648,10.4H132.564
                  c-9.088,0-17.504-3.712-23.616-10.432c-6.144-6.72-9.056-15.392-8.224-24.48L126.612,160h33.376v48c0,8.832,7.168,16,16,16
                  c8.832,0,16-7.168,16-16v-48h128v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h33.376l25.92,285.12
                  C412.116,454.176,409.204,462.88,403.06,469.6z"/>

            </svg>
          </a>
        </li>
        <li class="action-search">
<!--           <a href="{{route('shoping.producd.detils',$p_varient_id)}}"> -->
  <a href="javascript:void(0)" data-ajaxid="#frontmodalview" data-url="{{route('shoping.producd.detils',$product['varient_id'])}}" data-modal="#frontmodal" onclick="showmodal(this)">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
              <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
                S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
                c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
                M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
          </svg>
          </a>
        </li>
        </ul>
      </div>
  </div>

@endforeach
@else
     <div class="products-col-inner">
      @lang('title.no_product_found')
             </div>
@endif
    </div>
          </div>

            </div> 
          </div>
 