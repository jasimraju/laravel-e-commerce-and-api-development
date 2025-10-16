
<!-- end banner side  -->

                                @php 
$total = 0;
if(!empty($final_cart)){
    $countitem = $final_cart->count();
}
@endphp
                    <div class="row" id="shoping-cart-details">
                    <div class="col-xl-9 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="cart-area">
                            <div class="cart-details">
                                <div class="cart-item">
                                    <span class="cart-head">@lang('title.my_cart'):</span>
                                    <span class="c-items">@isset($countitem) {{$countitem}} @endisset @lang('title.item')</span>
                                </div>

                                @forelse($final_cart as $shopcart)
                                <div class="cart-all-pro">
                                    <div class="cart-pro">
                                        <div class="cart-pro-image">
                                            <a href="#"><img src="{{asset('public/storage'.$shopcart->image)}}" class="img-fluid img-cart-fluid"></a>
                                        </div>
                                        <div class="pro-details">
                                            <h4><a href="#">{{$shopcart->title}}</a></h4>
											<div class="additional-cart-info">
												<span class="pro-size"><span class="size">Size:</span> {{$shopcart->unit_details}}</span>
												<span class="pro-shop">{{$shopcart->brand}}</span>
												<span class="cart-pro-price">S${{$shopcart->price}}  </span>
											</div>
                                        </div>
                                    </div>
                                    <div class="qty-item">
                                        <div class="center">
                                            <div class="plus-minus">
                                                <span>
                                                    <a href="javascript:void(0)" class="minus-btn text-black @if($shopcart->qty == 1) d-none @endif" onclick="productqtychange(this,2)" data-view-other-1="shopcart" data-url-1="{{route('shoping.cart.add',$shopcart->varient_id)}}" data-input-id-1="#shopcart-input-{{$shopcart->id}}" data-url-2="{{route('shoping.cart.showcart')}}" data-view-port-1="main-container"  data-view-port-2="mini-shoping-card" id="shop-mins-{{$shopcart->id}}" data-number-of-view="2" data-set-time="1000" data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total">-</a>
                                                    <input id="shopcart-input-{{$shopcart->id}}" type="text" name="name" value="{{$shopcart->qty}}">
                                                    <a href="javascript:void(0)" class="plus-btn text-black" onclick="productqtychange(this,1)" data-view-other-1="shopcart" data-url-1="{{route('shoping.cart.add',$shopcart->varient_id)}}" data-input-id-1="#shopcart-input-{{$shopcart->id}}" data-url-2="{{route('shoping.cart.showcart')}}" data-view-port-1="main-container"  data-view-port-2="mini-shoping-card" data-number-of-view="2" data-set-time="1000" data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total">+</a>
                                                </span>
                                            </div>
                                            <a href="javascript:void(0)" onclick="productqtychange(this)" data-view-other-1="shopcart" data-url-1="{{route('shoping.cart.deleted',[$shopcart->id,2])}}"  data-url-2="{{route('shoping.cart.showcart')}}" data-view-port-1="main-container"  data-view-port-2="mini-shoping-card" data-number-of-view="2" data-set-time="1000" class="pro-remove" data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total">@lang('title.remove')</a>
                                        </div>
                                    </div>
                                    <div class="all-pro-price">
                                        <span>S${{$shopcart->price*$shopcart->qty}}  </span>
                                    </div>
                                </div>
                                  @php 
                            $total = ($shopcart->qty*$shopcart->price) + $total;
                          @endphp
                                @empty

                                @endforelse
                            </div>
                        </div>
                       <div class="cart-area">
                            <div class="cart-details">
                         
                             
                            </div>
                        </div>
               
			   
			   <div class="cart-area">
			   <div class="cart-details">
					<div class="other-link">
                                    <ul class="c-link">
                                        
                                        <li class="cart-other-link"><a href="{{route('homepage')}}">@lang('title.continue_shopping')</a></li>
                                        <li class="cart-other-link"><a href="javascript:void(0)" onclick="productqtychange(this)" data-view-other-1="shopcart" data-url-1="{{route('shoping.cart.deleted',[0,2])}}"  data-url-2="{{route('shoping.cart.showcart')}}" data-view-port-1="main-container"  data-view-port-2="mini-shoping-card" data-number-of-view="2" data-set-time="1000" class="pro-remove" data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total">@lang('title.clear_cart')</a></li>
                                    </ul>
                                </div>
					</div>
					</div>
								
								
								     </div>
                    <div class="col-xl-3 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="cart-total">
                            <div class="cart-price">
                                <span>@lang('title.subtotal')</span>
                                <span class="total">S${{$total}}  </span>
                            </div>
                         
                            <div class="shop-total">
                                <span>@lang('title.total')</span>
                                <span class="total-amount">S${{$total}} </span>
                            </div>
                            <a href="{{route('front.checkout')}}" class="check-link gradient-style-2">@lang('title.checkout')</a>
                        </div>
                    </div>
            </div>