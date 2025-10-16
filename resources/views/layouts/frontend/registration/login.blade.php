
  <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="login-area">
                        <div class="login-box">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
                            <h1>{{ __('Login') }}</h1>

                            <p>Please login below account detail</p>
                            @if(!empty($mes))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    {{$mes}}
  </div>
</div>
@endif
                           
                              <form method="POST" id="login-form" action="{{ route('login') }}">
                        @csrf
                                <label class ="@error('email') text-danger @enderror" >{{ __('E-Mail Address') }}</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                 @error('email')
                                       <div class="error invalid-feedback" >{{ $message }}</div>
                                @enderror
                                <label class ="@error('password') text-danger @enderror">{{ __('Password') }}</label>
                                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                                 @error('password')
                                   <div class="error invalid-feedback" >{{ $message }}</div>
                                @enderror
                              
                                 <div class="shopping-cart-button mt-5 justify-content-center w-100">
                                                   <a href="javascript:void(0)"  onclick="submitDetailsForm(this)"  class="gradient-style-2" data-form-id="#login-form">{{ __('Login') }}</a>
                                                </div>
                                                    @if (Route::has('front.log.forgetpassword'))
                                    <a class="re-password" href="{{ route('front.log.forgetpassword') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                               
                               <ul class="login-with-socials">
                               
                               
                           
                            @if (Route::has('facebook.login'))
                           <li> 
                               <a class="login-with-facebook" href="{{route('facebook.login')}}">
                                  <i class="fab fa-facebook-f"></i> Login with Facebook
                            </a>
                            </li>
                            @endif
                            @if(Route::has('gmail.login'))
                            <li> 
                            <a class="login-with-gmail"href="{{route('gmail.login')}}">
                               <i class="fa fa-envelope"></i> Login with Gmail
                            </a>
                            </li>                    
                            @endif
                       </ul>     
                            
                                
                            </form>
                        </div>
                        <div class="login-account">
                            <h4>Don't have an account?</h4>
                            <a href="{{route('front.registration')}}" class="ceate-a">Create account</a>
                            <div class="login-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> Terms & conditions.</a>
                                <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="privacy-policy.html">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>