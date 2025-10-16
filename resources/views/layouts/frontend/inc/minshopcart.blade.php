              
<!-- mini-shoping-card -->
@php 
$total = 0;
if(!empty($final_cart)){
$count_item_number = $final_cart->count();
}
else{
    $count_item_number = 0;
}
@endphp
<input type="hidden" id="shoping-count-item" value="{{$count_item_number}}">
            @forelse($final_cart as $cart)
                   <div class="media d-flex align-items-center">
                        
                            <img src="{{asset('public/storage'.$cart->image)}}" class="mini-thumb">
                            <div class="media-body">
                            <h5 class="mt-0"><a href="#">{{$cart->title}}</a></h5>
                            <h4><span class="mini-qty">{{$cart->qty}} × </span>S${{$cart->price}}</h4>                        
                            </div>
                            <span class="close"><a href="javascript:void(0)" onclick="productqtychange(this)" data-view-other-1="shopcart" data-url-1="{{route('shoping.cart.deleted',$cart->id)}}"  data-url-2="{{route('shoping.cart.showcart',2)}}" data-view-port-1="mini-shoping-card"  data-view-port-2="shoping-cart-details" data-number-of-view="2" data-set-time="1000"  data-shoping-cart="#shoping-count-item" data-shoping-cart-total="#shoping-total"><i class="far fa-times-circle"></i></a></span>
                          </div>
                          @php 
                            $total = ($cart->qty*$cart->price) + $total;
                          @endphp
                                              
    @empty
    <p>@lang('label.no_items_found')</p>
@endforelse
                                              
                                        @if( !empty($final_cart) && $final_cart->count() >= 1) 
                                              
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4><span class="mini-cart-total">@lang('title.total')</span> <span class="mini-tootal-amount" id="shoping-total">S${{$total}}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('front.cart')}}" class="gradient-style-1">@lang('title.view_cart')</a>
                                                    <a href="{{route('front.checkout')}}" class="gradient-style-2">@lang('title.checkout')</a>
                                                </div>
                                            </div>
                                            @endif
