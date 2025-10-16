<section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="register-area">
                        <div class="register-box">
                            <h1>@lang('title.create_account')</h1>
                           
                            <form action="{{route('front.registration')}}" id="registration-save-form">
                                @csrf
                                    <label id="label-first_name" class="text-succss mt-1">@lang('label.first_name'):<span class="text-danger">*</span></label>
                                <input type="text" id="parent-first_name" name="first_name" placeholder="@lang('label.first_name')">
                                 <div class="error d-none" id="error-first_name"></div>

                                <label  id="label-last_name" class="text-succss mt-1">@lang('label.last_name'):<span class="text-danger">*</span></label>
                                <input type="text" id="parent-last_name" name="last_name" placeholder="@lang('label.last_name')">
                                <div class="error d-none" id="error-last_name"></div>

                                <label id="label-email" class="text-succss mt-1">@lang('label.email'):<span class="text-danger">*</span></label>
                                <input type="text" id="parent-email" class="form-control"  name="email" placeholder="@lang('label.email')">
                                 <div class="error d-none" id="error-email"></div>  

                                 <label id="label-phone" class="text-succss mt-1">@lang('label.phone'):<span class="text-danger">*</span></label>
                                <input type="text" id="parent-phone" class="form-control"  name="phone" placeholder="@lang('label.phone')">
                                 <div class="error d-none" id="error-phone"></div>

                                <label id="label-dob" class="text-succss mt-1">@lang('label.date_of_brith'):<span class="text-danger">*</span></label>
                                <input type="date" id="parent-dob" class="form-control" name="dob">
                                <div class="error d-none" id="error-dob"></div>

                                   <label  id="label-country_id" class="form-label">@lang('label.select_country')<span class="text-danger">*</span></label>
                                                <select  id="parent-country_id" name="country_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                                </div>

                                <label id="label-password" class="text-succss mt-1">@lang('label.password'):<span class="text-danger">*</span></label>
                                <input type="password" id="parent-password"  class="form-control" name="password" placeholder="@lang('label.password')">
                                   <div class="error d-none" id="error-password">
                                                </div>    

                                <label id="label-password_confirmation" class="text-succss mt-1">@lang('label.confirm'):<span class="text-danger">*</span></label>
                                
                                <input type="password" id="parent-password_confirmation" class="form-control" name="password_confirmation" placeholder="@lang('label.confirm')" >
                                  <div class="error d-none" id="error-password_confirmation"></div>


                                <div class="shopping-cart-button mt-5 justify-content-center w-100">
                                                   <a href="javascript:void(0)"  data-replace="{{route('front.log.login')}}" onclick="formsubmit(this)" id="registration-save" class="gradient-style-2">Create</a>
                                                </div>
                            </form>
                        </div>
                        <div class="register-account">
                            <h4>Already an account holder?</h4>
                            <a href="{{route('front.log.login')}}" class="ceate-a">@lang('label.log_in')</a>
                            <div class="register-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> Terms & conditions.</a>
                                <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="privacy-policy.html">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>