   <form action="{{route('admin.add.customer')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-first_name" class="form-label">
                                                    @lang('label.first_name')
                                                    <span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-first_name" name="first_name" class="form-control" >
		                                        <div class="error d-none" id="error-first_name">
		                                        </div>
		                                    </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-brand_company_name" class="form-label">@lang('label.last_name')
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" id="parent-last_name" name="last_name" class="form-control" >
                                                <div class="error d-none" id="error-last_name">
                                                </div>
                                            </div>
                                    </div>
                                      <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-email" class="form-label">@lang('label.email')
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" id="parent-email" name="email" class="form-control" >
                                                <div class="error d-none" id="error-email">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-phone"  class="form-label">@lang('label.phone')<span class="text-danger">*</span></label>
                                                      
                                                <input type="text" id="parent-phone" name="phone" class="form-control" >
                                                <div class="error d-none" id="error-phone">
		                                        </div>
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-country_id" class="form-label">@lang('label.country')
                                                    <span class="text-danger">*</span></label>
                                             
                                                <select  id="parent-country_id" name="country_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($courntries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                                </div>
                                            </div>
                                    </div>
                                     <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-password"  class="form-label">@lang('label.password')<span class="text-danger">*</span></label>
                                                      
                                                <input type="password" id="parent-password" name="password" class="form-control" >
                                                <div class="error d-none" id="error-password">
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div><!-- end row -->
                                         <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>

                                  
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                              
 </form>