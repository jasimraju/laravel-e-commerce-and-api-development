    <div class="tab-pane fade show active" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                    <div class="myaccount-content">
                       <h3>{{$title}}</h3>
                      <div class="account-details-form">
                        <form method="POST" id="profile-submit-form" action="{{ route('customer.accountdetaisl') }}"  >
                           @csrf
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                
                                 <label class ="form-label" id="label-first_name" >@lang('label.first_name')</label>
                                                <input type="text" id="parent-first_name" value="{{Auth::user()->first_name}}"  name="first_name" placeholder="@lang('label.last_name')">
                                                <div class="error d-none" id="error-first_name">
                              </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label class ="form-label" id="label-last_name">@lang('label.last_name')</label>
                                <input type="text" id="parent-last_name" value="{{Auth::user()->last_name}}"  name="last_name" placeholder="@lang('label.last_name')">
                                                <div class="error d-none" id="error-last_name">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="single-input-item">
                            <label class ="form-label" id="label-country_id">@lang('label.country')</label>
                               <select name="country_id"  id="parent-country_id">
                                                    <option value=" ">@lang('label.select_country')</option>
                                                  @foreach($countrise as $country)
                                        
                                        <option value="{{$country->id}}" @if(Auth::user()->country_id == $country->id ) selected @endif >{{$country->name}}</option>
                                        
                                    @endforeach
                                  </select>
                                                <div class="error d-none" id="error-country_id"></div>
                          </div>
                        </div>
                          <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="email" class="required">@lang('label.email') @lang('label.address')</label>
                            <span>{{Auth::user()->email}}</span>
                          </div>
                        </div>
                          
                          <div class="single-input-item">
                            <button id="profile-submit" onclick="formsubmit(this)" type="button" class="check-btn sqr-btn">@lang('label.save_change')</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>