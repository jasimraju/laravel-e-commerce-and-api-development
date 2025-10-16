  
 @csrf


  <h2>Billing details</h2>
  @if(!empty($address))
 <input type="hidden" name="address_id" id="exit_address_id" value="{{$address->id}}">
  @endif

                                    <div class="billing-form p-3" id="billling-form">
                                        @if(!empty($address))
                                        <ul class="list-unstyled">
                                             <li class="billing-li">
                                                  <input type="checkbox" id="address" data-url="{{route('user.address')}}" data-id="#exit_address_id" data-class="addressinput" onchange="flashinput(this)" >
                                                <label class ="form-label" id="label-first_name" >Add New Address</label>
                                               
                                                <div class="error d-none" id="error-first_name">
                                            </li> 
                                        </ul>
                                        @endif
                                        <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-first_name" >First name</label>
                                                <input type="text" id="parent-first_name" class="addressinput" name="first_name" placeholder="First name" @if(!empty($address) && !empty($address->first_name)) value= "{{$address->first_name}}" @endif >
                                                <div class="error d-none" id="error-first_name">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-last_name" >Last name</label>
                                                <input type="text" name="last_name"class="addressinput" id="parent-last_name" placeholder="Last name" @if(!empty($address) && !empty($address->last_name)) value= "{{$address->last_name}}" @endif >
                                                <div class="error d-none" id="error-last_name">
                                            </li>
                                        </ul>
                                                <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-apartment" >Apartment, Building, House etc (Optional)</label>
                                                <input type="text" name="apartment" class="addressinput"  id="parent-apartment" @if(!empty($address) && !empty($address->apartment)) value= "{{$address->apartment}}" @endif >
                                                <div class="error d-none" id="error-apartment">
                                            </li>
                                        </ul>
                                        
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-zone" >Unit</label>
                                                <input type="text" name="unit"class="addressinput" id="parent-unit" placeholder="Unit" @if(!empty($address) && !empty($address->unit)) value= "{{$address->unit}}" @endif>
                                                <div class="error d-none" id="error-zone">
                                            </li>
                                        </ul>
                                              <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-address" >Street address</label>
                                                <input type="text" name="address" class="addressinput" id="parent-address" placeholder="Street address" @if(!empty($address) && !empty($address->address)) value= "{{$address->address}}" @endif>
                                                <div class="error d-none" id="error-address">
                                            </li>
                                        </ul>
                                
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-town_city" >Town / City</label>
                                                <input type="text" name="town_city" class="addressinput" @if(!empty($address) && !empty($address->town_city)) value= "{{$address->town_city}}" @endif id="parent-town_city" placeholder="">
                                                <div class="error d-none" id="error-town_city">
                                            </li>
                                        </ul>
                                    
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-post_code" >Postcode / ZIP</label>
                                                <input type="text" name="post_code" class="addressinput" id="parent-post_code" @if(!empty($address) && !empty($address->post_code)) value= "{{$address->post_code}}" @endif placeholder="">
                                                <div class="error d-none" id="error-post_code">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-email_address" >Email address</label>
                                                <input type="text" name="email_address" class="addressinput" id="parent-email_address" placeholder="Email address" @if(!empty($address) && !empty($address->email_address)) value= "{{$address->email_address}}" @endif>
                                                <div class="error d-none" id="error-email_address">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-phone" >Phone</label>
                                                <input type="text" name="phone" class="addressinput"  @if(!empty($address) && !empty($address->phone)) value= "{{$address->phone}}" @endif id="parent-phone" placeholder="Phone">
                                                <div class="error d-none" id="error-phone">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-country_id" >Country</label>
                                                <select name="country_id" class="addressinput" id="parent-country_id">
                                                    <option value=" ">Select a country</option>
                                                  @foreach($countries as $country)
                                        
                                        <option value="{{$country->id}}" @if(!empty($address) && !empty($address->country_id) && $address->country_id == $country->id ) selected @endif >{{$country->name}}</option>
                                        
                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                            </li>
                                        </ul>
                                  
                                    </div>
                              
                                <div class="billing-details p-3">

                                    
                                        <h2>Shipping details</h2>
                                        <ul class="shipping-form list-unstyled p-3">
                                            <li class="check-box">
                                                <input type="checkbox" name="is_shping" value="1" onchange="showchange(this)" data-id="#shipping-form">
                                                <label>Ship to a different address?</label>
                                            </li>
                                             <div class="billing-form d-none" id="shipping-form">
                                                       <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_first_name" >First name</label>
                                                <input type="text" id="parent-ship_first_name" name="ship_first_name" placeholder="First name">
                                                <div class="error d-none" id="error-ship_first_name">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_last_name" >Last name</label>
                                                <input type="text" name="ship_last_name" id="parent-ship_last_name" placeholder="Last name">
                                                <div class="error d-none" id="error-ship_last_name">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_zone" >Zone (Optional)</label>
                                                <input type="text" name="ship_zone" id="parent-ship_zone" placeholder="Zone">
                                                <div class="error d-none" id="error-ship_zone">
                                            </li>
                                        </ul>
                                              <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_address" >Street address</label>
                                                <input type="text" name="ship_address" id="parent-ship_address" placeholder="Street address">
                                                <div class="error d-none" id="error-ship_address">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_apartment" >Apartment, Building, House etc (Optional)</label>
                                                <input type="text" name="ship_apartment" id="parent-ship_apartment" placeholder="">
                                                <div class="error d-none" id="error-ship_apartment">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_town_city" >Town / City</label>
                                                <input type="text" name="ship_town_city" id="parent-ship_town_city" placeholder="">
                                                <div class="error d-none" id="error-ship_town_city">
                                            </li>
                                        </ul>
                                   
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_post_code" >Postcode / ZIP</label>
                                                <input type="text" name="ship_post_code" id="parent-ship_post_code" placeholder="">
                                                <div class="error d-none" id="error-ship_post_code">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_email_address" >Email address</label>
                                                <input type="text" name="ship_email_address" id="parent-ship_email_address" placeholder="Email address">
                                                <div class="error d-none" id="error-ship_email_address">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_phone" >Phone</label>
                                                <input type="text" name="ship_phone" id="parent-ship_phone" placeholder="Phone">
                                                <div class="error d-none" id="error-ship_phone">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-ship_country_id" >Country</label>
                                                <select name="ship_country_id" id="parent-ship_country_id">
                                                    <option>Select a country</option>
                                                  @foreach($countries as $country)
                                        
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        
                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-ship_country_id">
                                            </li>
                                        </ul>
                                    </div>
                                            <li class="comment-area">
                                                <label>Order notes(Optional)</label>
                                                <textarea name="order_note" rows="4" cols="80"></textarea>
                                            </li>
                                        </ul>
                                        
                                   
                                </div>