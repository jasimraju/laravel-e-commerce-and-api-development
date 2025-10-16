 <form method="POST" id="place_order-form" action="{{route('front.checkout.submit')}}" >     
                                      <section class="section-tb-padding mt-5">
                                          
            <div class="container">
                <div class="row">

                    <div class="col">
                     
                        <div class="checkout-area">
                 

                            
                            <div class="billing-area">
                                                

                                     <div class="delevery-schedule-area">
                             <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Select your delivery schedule
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                    <div class="date-schedule">
                                      @foreach($delivry_slot as $dilivry_st)
                                        <div class="form-check form-check-inline">

                                              <input class="form-check-input" type="radio" name="dayslot" id="dayslot-{{$dilivry_st['id']}}" value="{{$dilivry_st['id']}}_{{$dilivry_st['dayname']}}">
                                              <label class="form-check-label" data-type="{{$dilivry_st['id']}}"  data-add ="#time-slot-" data-check-id="#dayslot-{{$dilivry_st['id']}}" onclick="showSelect(this)" id="label-dayslot-{{$dilivry_st['id']}}" for="label-dayslot-{{$dilivry_st['id']}}">{{$dilivry_st['dayname']}}</label>
                                            </div>
                                            
                                            <div class="time-schedule mt-5 d-none" id="time-slot-{{$dilivry_st['id']}}">
                                              @foreach($dilivry_st['time_slot'] as $timeslot)
                                              <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="time_{{$dilivry_st['id']}}[]"  value="{{$timeslot['id']}}">
                                              <label class="form-check-label" onclick="showSelect(this)"  for="inlineRadio7">{{$timeslot['title']}}</label>
                                            </div>
                                            @endforeach
                                            </div>
                                            
                                            @endforeach
                                     
                                    </div>
                                           <div class="time-schedule mt-5" id="show-time-slot">
                                      
                                     
                                    </div>
                             
       </div>
    </div>
  </div>
 
 
</div>
                               
                            </div>
                            
                                
                                      <div id="address_view" >
                                      @auth
                                      
                                  @include('layouts.frontend.shopingcart.address')
                                  
                                     @endauth
                                     </div>
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                  
                                     
                                     
                                     
                                     
                                     
                            </div>
                            @php 
$total = 0;
if(!empty($final_cart)){
$count_item_number = $final_cart->count();
}
else{
    $count_item_number = 0;
}
@endphp
                            <div class="order-area">
                                <div class="check-pro">
                                    <h2>In your cart ({{$count_item_number}})</h2>
                                    <ul class="check-ul list-unstyled">
                                        @foreach($carts as $cart)
                                        <li>
                                            <div class="check-pro-img">
                                                <a href="#"><img src="{{asset('public/storage'.$cart['image'])}}" class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="check-content">
                                                <a href="#">{{$cart['title']}}</a>
                                                <span class="check-code-blod">SKU: <span>{{$cart['sku']}}</span></span>
                                                <span class="check-price">S${{$cart['qty']*$cart['price']}}</span>
                                            </div>
                                        </li>
                                        @php 
                            $total = ($cart['qty']*$cart['price']) + $total;
                          @endphp
                                      @endforeach
                                    </ul>
                                </div>
                                <h2>Your order</h2>
                                <ul class="order-history list-unstyled">
                                    <li class="order-details">
                                        <span>Product:</span>
                                        <span>Total</span>
                                    </li>
                                    @foreach($carts as $cart)
                                    <li class="order-details">
                                        <span>{{$cart['title']}}:</span>
                                        <span>S${{$cart['qty']*$cart['price']}}</span>
                                    </li>
                                    
                                    @endforeach
                                    <li class="order-details">
                                        <span>Subtotal:</span>
                                        <span>S${{$total}}</span>
                                    </li>
                                    <li class="order-details">
                                        <span>Shipping Charge:</span>
                                        <span>Free shipping</span>
                                    </li>
                                    <li class="order-details">
                                        <span>Total:</span>
                                        <span>S${{$total}}</span>
                                    </li>
                                </ul>
                            
                                    <ul class="order-form list-unstyled">
                                    
                                    
                                        @foreach($paymentmethods as $paymentmethod)
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="payment_id"  value="{{$paymentmethod->id}}">
                                          <label class="form-check-label" id="label-payment_id" for="Direct_bank_transfer">
                                           
                                    @lang($paymentmethod->language_file_name.'.'.$paymentmethod->name)
                                          </label>
                                           <div class="error d-none" id="error-payment_id">
                                        </div>
                                        @endforeach
                                        
                                        
                                       
                                        <li class="pay-icon">
                                            <a href="javascript:void(0)"><i class="fa fa-credit-card"></i></a>
                                            <a href="javascript:void(0)"><i class="fab  fa-cc-visa"></i></a>
                                            <a href="javascript:void(0)"><i class="fab  fa-cc-paypal"></i></a>
                                            <a href="javascript:void(0)"><i class="fab  fa-cc-mastercard"></i></a>
                                        </li>
                                    </ul>
                               
                                <div class="checkout-btn">
                                    @auth
                                    <a href="javascript:void(0)" id="place_order" class="gradient-style-2" data-url="{{route('front.checkout.submit')}}"  data-ajaxid="#front-end-ajax" data-modal="#front-modal" onclick="formsubmit(this)">Place order</a>
                                    @endauth
                                    @guest
                                    <a href="javascript:void(0)" id="place_order" class="gradient-style-2" data-url="{{route('front.log.login.ajax')}}" data-url-exta="{{route('front.checkout.submit')}}" data-ajaxid="#front-end-ajax" data-modal="#front-modal" data-callback="afterajax_login" onclick="showmodal(this)">Place order</a>
                                    @endguest
                                </div>
                            </div>

                        </div> 
                         
                    </div>
                </div>
            </div>
        </section>
            </form> 
      
