

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

 @foreach($productdetails['product_details'] as $productdetail)
   @php 
          $p_uniqe_id = $productdetail['product_id'].'_'.$productdetail['varient_id'].'_'.$productdetail['supplier_id'];
          $w_uniqe_id = $productdetail['product_id'].'_'.$productdetail['varient_id'];
          $p_varient_id = $productdetail['varient_id'];
          @endphp
 <section class="pro-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-xs-12 pro-image">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 larg-image">
							
 				
							
							
							<div class="single-gallery-slider">
							
                                <div class="product-large-gallery">
                                    <div class="position-relative">
                                            <a href="{{$productdetail['image_url']}}" class="long-img">
                                                <img src="{{$productdetail['image_url']}}" class="img-fluid" alt="image">
                                        </a>
                                          @if(!empty($productdetail['discount_parcentage']) && !empty($productdetail['discount']) )
										<span class="sale-badge gradient-style-2">-{{$productdetail['discount_parcentage']}}%</span>
                                        @endif
                                    </div>
                                </div>   

							</div>
 
								
								
								
                                <ul class="pro-page-slider pl-0">
                             
                                    <li class="nav-item items">
                                      <img src="{{$productdetail['image_url']}}" class="img-fluid" alt="iamge">
                                    </li>
                             
                                </ul>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info">
                                <h2>{{$productdetail['name']}}</h2>
                                <div class="rating d-none">
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="pro-availabale">
                                    <span class="available">Availability:</span>
                                    <span class="pro-instock">In stock</span>
                                </div>
                                <div class="pro-price">
                                    <span class="new-price">S${{$productdetail['price']-$productdetail['discount']}}</span>
                                     @if(!empty($productdetail['discount_parcentage']) && !empty($productdetail['discount']) )
                                    <span class="old-price"><del>S${{$productdetail['price']}}</del></span>
                            @endif
                                </div>
                                @if(!empty($productdetail['end_date']))
                                <span class="pro-details text-danger">{{$productdetail['end_date']}}</span>
                                @endif
                                <p>{{$productdetail['description']}}</p>
                  <div class="pro-items">
                                    <span class="pro-size">@lang('title.available_option'):</span>
                                    <ul class="pro-wight list-unstyled">
                                        @foreach($productdetails['varient_list'] as $varientname)
                                        <li><a href="javascript:void(0)" @if($varientname['varient_id'] == $productdetail['varient_id'])class="active" @endif>{{$varientname['varient_name']}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
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
                                <div class="pro-btn">
                                    <a href="#" class="btn gradient-style-2 text-white" ><i class="fa fa-heart"></i></a>
                                    <a href="javascript:void(0)" class="btn gradient-style-2 text-white @if(in_array($p_varient_id,$cart_var)) data-product-details-info='yes' primary_active @endif" @if(in_array($p_varient_id,$cart_var)) data-product-details-info='yes' data-bs-toggle="tooltip" data-bs-html="true" title="You all ready add Number of {{$cart_var_qty[$p_varient_id]}}" @endif data-product-details="productdetail-{{$p_uniqe_id}}" data-url="{{route('shoping.cart.add',$p_uniqe_id)}}" onclick="showview(this)" data-viewport="mini-shoping-card"  data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total" data-shoping-class="primary_active" data-alert-type="success" data-alert-text="@lang('message.product_added_to_cart_successfully')" data-alert-timer="2000"><i class="fa fa-shopping-bag"></i>  @if(in_array($p_varient_id,$cart_var)) Add to more cart @else Add to more cart @endif</a>
                                    
                                </div>
                       
                        
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-xs-12 pro-shipping">
                        <div class="product-service">
                            <div class="icon-title">
                                <span><i class="fas fa-truck-moving"></i></span>
                                <h4>Delivery info</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                        </div>
                        <div class="product-service">
                            <div class="icon-title">
                                <span><i class="fas fa-sync-alt"></i></span>
                                <h4>30 days returns</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                        </div>
                        <div class="product-service">
                            <div class="icon-title">
                                <span><i class="fas fa-shield-alt"></i></span>
                                <h4>10 year warranty</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            
        @endforeach
        @php 
        $products = $productdetails['similar_product']
        @endphp 
        <!-- product page tab end -->
    @include('layouts.frontend.product.similar_product')