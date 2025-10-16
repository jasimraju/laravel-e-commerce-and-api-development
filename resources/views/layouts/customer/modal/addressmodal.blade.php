     @if(isset($address))
     @php 
     $url = route('customer.addressmodal',$address->id);
     @endphp
     @else
      @php 
      $url = route('customer.addressmodal');
      @endphp
     @endif

     <form method="POST" id="profile-submit-form" action="{{ $url }}"  >
                           @csrf
    <div class="billing-form p-3" id="billling-form">
                                    
                                        <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-first_name" >@lang('label.first_name')</label>
                                                <input type="text" id="parent-first_name" class="addressinput" name="first_name" placeholder="First name" value="@if(isset($address) && !empty($address->first_name)){{$address->first_name}} @endif">
                                                <div class="error d-none" id="error-first_name">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-last_name" >@lang('label.last_name')</label>
                                                <input type="text" name="last_name"class="addressinput" id="parent-last_name" placeholder="Last name" value="@if(isset($address) && !empty($address->last_name)) {{$address->last_name}} @endif" >
                                                <div class="error d-none" id="error-last_name">
                                            </li>
                                        </ul>
                                                <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-apartment" >@lang('label.apartment_building,_house_etc_(optional)')</label>
                                                <input type="text" name="apartment" class="addressinput"  id="parent-apartment" value="@if(isset($address) && !empty($address->apartment)) {{$address->apartment}} @endif" >
                                                <div class="error d-none" id="error-apartment">
                                            </li>
                                        </ul>
                                        
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-zone" >@lang('label.unit')</label>
                                                <input type="text" name="unit"class="addressinput" id="parent-unit" placeholder="Unit" value="@if(isset($address) && !empty($address->unit)) {{$address->unit}} @endif">
                                                <div class="error d-none" id="error-zone">
                                            </li>
                                        </ul>
                                              <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-address" >@lang('label.street_address')</label>
                                                <input type="text" name="address" class="addressinput" id="parent-address" placeholder="Street address" value="@if(isset($address) && !empty($address->address)) {{$address->address}} @endif">
                                                <div class="error d-none" id="error-address">
                                            </li>
                                        </ul>
                                
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-town_city" >@lang('label.town_city')</label>
                                                <input type="text" name="town_city" class="addressinput"  id="parent-town_city" placeholder="" value="@if(isset($address) && !empty($address->town_city)) {{$address->town_city}} @endif">
                                                <div class="error d-none" id="error-town_city">
                                            </li>
                                        </ul>
                                    
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-post_code" >@lang('label.postal_code')</label>
                                                <input type="text" name="post_code" class="addressinput" id="parent-post_code"  placeholder="" value="@if(isset($address) && !empty($address->post_code)) {{$address->post_code}} @endif">
                                                <div class="error d-none" id="error-post_code">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2 list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-email_address" >@lang('label.email') @lang('label.address')</label>
                                                <input type="text" name="email_address" class="addressinput" id="parent-email_address" placeholder="Email address" value="@if(isset($address) && !empty($address->email_address)) {{$address->email_address}} @endif" >
                                                <div class="error d-none" id="error-email_address">
                                            </li>
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-phone" >@lang('label.phone')</label>
                                                <input type="text" name="phone" class="addressinput" id="parent-phone" placeholder="Phone" value="@if(isset($address) && !empty($address->phone)) $address->phone @endif">
                                                <div class="error d-none" id="error-phone">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul list-unstyled">
                                            <li class="billing-li">
                                                <label class ="form-label" id="label-country_id" >@lang('label.country')</label>
                                                <select name="country_id" class="addressinput" id="parent-country_id">
                                                    <option value=" ">@lang('label.select') @lang('label.country')</option>
                                                  @foreach($countries as $country)
                                        
                                        <option value="{{$country->id}}" @if(isset($address) && $address->country_id == $country->id) selected @endif >{{$country->name}}</option>
                                        
                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                            </li>
                                        </ul>
                                  <button id="profile-submit" onclick="formsubmit(this)" type="button" class="check-btn sqr-btn">@lang('label.save_change')</button>
                                    </div>
                                    </form>
