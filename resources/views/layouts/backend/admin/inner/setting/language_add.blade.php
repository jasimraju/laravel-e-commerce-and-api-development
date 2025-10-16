  <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    <form action="{{route('admin.add.lang.menu')}}" id="menu-save-form">
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
                                                <label  id="label-language"  class="form-label">@lang('label.language')</label>
                                                <input type="text"  name="language" id="parent-language" class="form-control" >
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
                                 