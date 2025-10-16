    <div class="tab-pane fade show active" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                    <div class="myaccount-content">
                       <h3>{{$title}}</h3>
                      <div class="account-details-form">
                        <form method="POST" id="profile-submit-form" action="{{ route('customer.changepassword') }}">
                          @csrf
                          <div class="row">
                               <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="current-pwd" id="label-oldpassword" class="required">@lang('label.old_password')</label>
                   <input type="password" name="oldpassword" id="parent-oldpassword"></div>
                   <div class="error d-none" id="error-oldpassword">
                            </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="single-input-item">
                                  <label for="new-pwd" id="label-newpassword" class="required">@lang('label.new_password')</label>
                                  <input type="password" name="newpassword"  id="parent-oldpassword" >
                                  <div class="error d-none" id="error-newpassword"></div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="single-input-item">
                                  <label for="confirm-pwd" class="required">@lang('label.confirm_password')</label>
                                  <input type="password" name="confirmpassword"></div>
                                </div>
                              </div>
                            </div>
                          
                          <div class="single-input-item">
                         <button id="profile-submit" onclick="formsubmit(this)" type="button" class="check-btn sqr-btn">@lang('label.save_change')</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>