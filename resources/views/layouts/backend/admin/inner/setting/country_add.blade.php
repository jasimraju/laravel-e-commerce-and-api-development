  <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    <form action="{{route('admin.add.country')}}" id="menu-save-form">
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-name" class="form-label">@lang('label.name')</label>
		                                        <input type="text" id="parent-name" name="name" class="form-control" >
		                                        <div class="error d-none" id="error-name">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-country_code"  class="form-label">@lang('label.country_code')</label>
                                                <input type="text"  name="country_code" id="parent-country_code" class="form-control" >
                                                <div class="error d-none" id="error-country_code">
		                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-country_currency_name" class="form-label">@lang('label.country_currency_name')</label>
                                                <input type="text" name="country_currency_name" id="parent-country_currency_name" class="form-control" >
                                                <div class="error d-none" id="error-country_currency_name">
		                                        </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-country_currency_code" class="form-label">@lang('label.country_currency_code')</label>
                                                <input type="text" name="country_currency_name" id="parent-country_currency_code" class="form-control" >
                                                <div class="error d-none" id="error-country_currency_code">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-iso_code" class="form-label">@lang('label.iso_code')</label>
                                                <input type="text" name="iso_code" id="parent-iso_code" class="form-control" >
                                                <div class="error d-none" id="error-iso_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-min_digits" class="form-label">@lang('label.min_digits')</label>
                                                <input type="text" name="min_digits" id="parent-min_digits" class="form-control" >
                                                <div class="error d-none" id="error-min_digits">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-max_digits" class="form-label">@lang('label.max_digits')</label>
                                                <input type="text" name="max_digits" id="parent-max_digits" class="form-control" >
                                                <div class="error d-none" id="error-max_digits">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-language" class="form-label">@lang('label.language')</label>
                                                <input type="text" name="language" id="parent-language" class="form-control" >
                                                <div class="error d-none" id="error-language">
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                             

                                  
                                    <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 