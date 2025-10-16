 <div class="modal-header">
                        <h5 class="modal-title" >{{ __('Login') }}</h5>
                           <h3>Please login below to continue</h3>
                        
                    </div>
<div class="container">
            <div class="row">
                
                        <div  class="login-box col">
                                
                           
                              <form method="POST" id="login-form" action="{{ route('login') }}">
                        @csrf
                                <label class ="form-label" id="label-email" >{{ __('E-Mail Address') }}</label>
                                <input type="text" name="email" id="parent-email" class="form-control" placeholder="{{ __('E-Mail Address') }}"  required autocomplete="email" autofocus>
                                <div class="error d-none" id="error-email">
                                            </div>
                                <label class ="form-label mt-3" id="label-password">{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control" id="parent-password" placeholder="{{ __('Password') }}">
                                 <div class="error d-none" id="error-password">
                                            </div>
                                                             @if (Route::has('password.request'))
                                    <a class="re-password text-danger mt-1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                 <div class="shopping-cart-button popup-footer-buttons mt-5  w-100 mb-1">
                                                   <a href="javascript:void(0)"  onclick="formsubmit(this)"  id="login" class="gradient-style-1" data-form-id="#login-form">{{ __('Login') }}</a>
                                                     <a href="{{route('front.registration')}}"   class="gradient-style-2 popup-registration">{{ __('Registration') }}</a>
                                                 
                                                </div>
                                   
                                
                            </form>
                        </div>
                        
                  
            </div>
        </div>
