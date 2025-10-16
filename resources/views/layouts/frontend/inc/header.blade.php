<header class="header-area">
  <div class="header-main-area">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="header-main">
                      <!-- logo start -->
                      <div class="header-element logo">
                          <a href="{{route('homepage')}}">
                            {!!image_compnent($metadata['app_setting']->applog,'img-fluid')!!}  
                              
                          </a>
                      </div>
                      <!-- logo end -->
                      <!-- search start -->
                      <div class="header-element search-wrap">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <select class="form-select" id="product_cat_list" name="product_cat_list">
                              <option selected>@lang('title.all_category')</option>
                              @foreach($categorylist as $catlist)
                               <option value="{{$catlist->id}}">@lang($catlist->language_file_name.'.'.$catlist->name)</option>
                               @endforeach
                            </select>
                          </div>
                          <input type="text" class="form-control header-search" placeholder="@lang('title.search_your_need')" >

                          <button type="submit" class="btn">
                            <svg width="30" height="30" version="1.1" id="lni_lni-search-alt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                         <path d="M62.1,57L44.6,42.8c3.2-4.2,5-9.3,5-14.7c0-6.5-2.5-12.5-7.1-17.1v0c-9.4-9.4-24.7-9.4-34.2,0C3.8,15.5,1.3,21.6,1.3,28
                           c0,6.5,2.5,12.5,7.1,17.1c4.7,4.7,10.9,7.1,17.1,7.1c6.1,0,12.1-2.3,16.8-6.8l17.7,14.3c0.3,0.3,0.7,0.4,1.1,0.4
                           c0.5,0,1-0.2,1.4-0.6C63,58.7,62.9,57.6,62.1,57z M10.8,42.7C6.9,38.8,4.8,33.6,4.8,28s2.1-10.7,6.1-14.6c4-4,9.3-6,14.6-6
                           c5.3,0,10.6,2,14.6,6c3.9,3.9,6.1,9.1,6.1,14.6S43.9,38.8,40,42.7C32,50.7,18.9,50.7,10.8,42.7z"/>
                         </svg>
                             </button>
                        </div>
                      </div>
                      <!-- search end -->
                    <div class="header-element d-flex right-block-box">
                      @auth
                          <div class="box-body my-account">
                              <a class="d-flex align-items-center" href="#">
                                  <div class="box-icon">
                                     <img src="{{ asset('images/icons/my-account.png') }}" alt="My account"/>
                                  </div>
                                  <div class="px-2  py-0 py-md-0">
                                      <h6>@lang('title.my_account')</h6>
                                      <span>@lang('title.log_in')</span>
                                   </div>
                              </a>
                              <div class="dropdown-account cart-dropdown-hm2">
                    @include('layouts.frontend.inc.min_menu_customer')
                            </div><!-- end mini shopingcard -->
                          </div>
                          @endauth
                          @guest
                            <div class="box-body my-account">
                              <a class="d-flex align-items-center" href="{{route('front.log.login')}}">
                                  <div class="box-icon">
                                     <img src="{{ asset('images/icons/my-account.png') }}" alt="My account"/>
                                  </div>
                                  <div class="px-2  py-0 py-md-0">
                                      <h6>@lang('title.login')</h6>
                                      <span></span>
                                   </div>
                              </a>
                              
                          </div>
                          @endguest

                          <div class="box-body my-wishlist">
                            <a class="d-flex align-items-center" href="#">
                                <div class="box-icon">
                                   <img src="{{ asset('images/icons/wishlist.png') }}" alt="My account"/>
                                </div>
                                <div class="px-2  py-0 py-md-0">
                                    <h6>@lang('title.wishlist')</h6>
                                    <span><span id="wishlist-item">0</span> @lang('title.items')</span>
                                 </div>
                            </a>
                                             <!-- start mini-shoping-card -->
              <div class="cart-dropdown-wrap cart-dropdown-hm2" id="mini-wishlist-card">
                    @include('layouts.frontend.inc.minwishlist')
                            </div><!-- end mini shopingcard -->
                        </div>  
                        
                        <div class="box-body my-cart">
                            <a class="d-flex align-items-center" href="#">
                                <div class="box-icon">
                                  <span class="cart-counter" id="item-min" >0</span>
                                   <img src="{{ asset('images/icons/cart.png')}}" alt="My account"/>
                                </div>
                                <div class="px-2  py-0 py-md-0">
                                    <h6>@lang('title.my_cart')</h6>
                                    <span id="item-amount" >S$0.00</span>
                                 </div>
                            </a>
                            <!-- start mini-shoping-card -->
              <div class="cart-dropdown-wrap cart-dropdown-hm2" id="mini-shoping-card">
                    @include('layouts.frontend.inc.minshopcart')
                            </div><!-- end mini shopingcard -->
                        </div>
                      <!-- header-icon end -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>