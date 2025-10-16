 @php
if(!empty($final_cart)) {
$cart_var = $final_cart->pluck('varient_id_value')->toArray();
$cart_var_qty = $final_cart->pluck('qty','varient_id_value')->toArray();
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


   <div class="modal-body p-0">

        <div class="quick-view-content-outer">

          <div class="quick-view-inner">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="row">
              
 @foreach($productdetails['product_details'] as $productdetail)
   @php 
          $p_uniqe_id = $productdetail['product_id'].'_'.$productdetail['varient_id'].'_'.$productdetail['supplier_id'];
          $w_uniqe_id = $productdetail['product_id'].'_'.$productdetail['varient_id'];
          $p_varient_id = $productdetail['varient_id'];
          @endphp 
              <div class="quick-view-content-outer">

          <div class="quick-view-inner">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="row">

              <div class="col-md-5">

      
            <div class="product-thumb-area">
                @if(!empty($productdetail['discount_parcentage']) && !empty($productdetail['discount']) )
                   <span class="sale-badge gradient-style-2">-{{$productdetail['discount_parcentage']}}%</span>
                                        @endif
              <img src="{{$productdetail['image_url']}}" alt="Product Title">
            </div>
          </div>
          <div class="col-md-7 position-relative">
            <div class="product-content-area">
                <ul class="product-categories">
                  <li><a href="#">{{$productdetail['category_name']}}</a></li>
                </ul>
                <h2 class="product-title">{{$productdetail['name']}}</h2>
                <div class="product-price ">
                  
                   <span class="regular-price">{{$productdetail['currency_sign']}}{{$productdetail['price']-$productdetail['discount']}}</span>
                                     @if(!empty($productdetail['discount_parcentage']) && !empty($productdetail['discount']) )
                                    <span class="discount-price"><del>{{$productdetail['currency_sign']}}{{$productdetail['price']}}</del></span>
                            @endif
                </div>

                <div class="product-content">
                  <p>{{$productdetail['description']}}</p>
                </div>
                @if(!empty($productdetail['end_date']))
                                <span class="popup-promo-content">{{$productdetail['end_date']}}</span>
                                @endif
                                <div class="modal-qty">
                                 <div class="pro-qty">
                                    <span class="qty">Quantity:</span>
                                    <div class="plus-minus">
                                        <span>
                                            <a href="javascript:void(0)" onclick="qtyincruse(this,1)" data-parent-id="#productdetail-{{$p_uniqe_id}}"  class="minus-btn text-black">-</a>
                                            <input type="text" id="productdetail-{{$p_uniqe_id}}"  value="1">
                                            <a href="javascript:void(0)" onclick="qtyincruse(this,2)" data-parent-id="#productdetail-{{$p_uniqe_id}}" class="plus-btn text-black">+</a>
                                        </span>
                                    </div>
                                </div>
                 </div>
    </div>
    <div class="popup-action-buttons">
      <div class="popup-action-inner">
           
      <div class="row">
        <div class="col-md-6 p-0">
            
                                    <a href="javascript:void(0)" data-deal-id-1="#product-list-cart-{{$p_uniqe_id}}" data-deal-id-2="#deal-list-cart-{{$p_uniqe_id}}" data-deal-two="yes"  class="btn gradient-style-1 text-white @if(in_array($p_varient_id,$cart_var)) data-product-details-info='yes' primary_active @endif" @if(in_array($p_varient_id,$cart_var)) data-product-details-info='yes' data-bs-toggle="tooltip" data-bs-html="true" title="You all ready add Number of {{$cart_var_qty[$p_varient_id]}}" @endif data-product-details="productdetail-{{$p_uniqe_id}}" data-url="{{route('shoping.cart.add',$p_uniqe_id)}}" onclick="showview(this)" data-viewport="mini-shoping-card"  data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total" data-shoping-class="primary_active" data-alert-type="success" data-alert-text="@lang('message.product_added_to_cart_successfully')" data-alert-timer="2000" data-dismiss="modal" aria-label="Close"><i class="fa fa-shopping-bag"></i>  @if(in_array($p_varient_id,$cart_var)) Add to more cart @else Add to more cart @endif</a>
          
        </div>
        <div class="col-md-6  p-0">
          <a href="{{route('shoping.producd.detils',$p_varient_id)}}" class="btn details-button">More Information</a>
        </div>
      </div>            
</div>
  </div>
</div>
            </div>
          </div>
        </div>
      
  
                    @endforeach
                          </div>
          </div>
        </div>
      </div>