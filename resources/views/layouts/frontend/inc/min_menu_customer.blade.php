              
<!-- mini-shoping-card -->
                                                               
                            <div class="media d-flex align-items-center">
                            
                            <div class="media-body">
                            <h5 class="mt-0"><a href="#">@lang('title.orders')</a></h5>
                                                    
                            </div>
                            
                          </div>
                                              
                                                
                                            <div class="shopping-cart-footer">
                                                
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('customer.dashboard')}}" class="gradient-style-1">@lang('title.go_dashboard')</a>
                                                    <form id="logout-form" method="post" action="{{route('logout')}}">
                                                        @csrf
                                                    <a href="javascript:void(0)"  onclick="submitDetailsForm(this)" data-form-id="#logout-form" class="gradient-style-2">@lang('title.logout')</a>
                                                </form>
                                                </div>
                                            </div>