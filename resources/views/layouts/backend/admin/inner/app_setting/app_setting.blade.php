   <form action="{{route('admin.add.addnewappsetting')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-app_name" class="form-label">@lang('label.app_name')</label>
		                                        <input type="text" id="parent-app_name" name="app_name" class="form-control" >
		                                        <div class="error d-none" id="error-app_name">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-title"  class="form-label">@lang('label.title')</label>
                                                <input type="text" id="parent-title" name="title" class="form-control" >
                                                <div class="error d-none" id="error-title">
		                                        </div>
                                            </div>
                                        </div>
                                 
                            
                                         
                                    </div><!-- end row -->
                                   

                                  
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                               <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.meta') @lang('menuitems.setting')</h4>
                                          <div class="row">
                                            <div class="col-12 row">
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-meta_title" class="form-label">@lang('title.meta') @lang('label.title') 
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"  name="meta_title" class="form-control" >
                                                <div class="error d-none" id="error-meta_title">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-meta_description"  class="form-label">@lang('title.meta') @lang('label.descripiton')<span class="text-danger">*</span></label>
                                            <textarea type="text"  name="meta_description" id="parent-meta_description" class="form-control" ></textarea>
                                                <div class="error d-none" id="error-meta_description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-meta_keywords" class="form-label">@lang('title.meta') @lang('label.keywords') 
                                                   </label>
                                                <textarea type="text"  name="meta_keywords" id="parent-meta_keywords" class="form-control" ></textarea>
                                                <div class="error d-none" id="error-meta_keywords">
                                                </div>
                                            </div>
                                    </div>
                          
                            </div>
                                         
                                    </div><!-- end row -->
                                    </div>
                                    </div>
                                    </div>

                                              <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.address')</h4>
                                          <div class="row">
                                            <div class="col-12 row">
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-address" class="form-label">@lang('title.address') 
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"  name="address" class="form-control" >
                                                <div class="error d-none" id="error-address">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-unit"  class="form-label">@lang('label.unit')<span class="text-danger">*</span></label>
                                            <input type="text"  name="unit" class="form-control" >
                                                <div class="error d-none" id="error-unit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-apartment" class="form-label">@lang('label.apartment') 
                                                   </label>
                                                <input type="text"  name="apartment" class="form-control" >
                                                <div class="error d-none" id="error-apartment">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-town_city"  class="form-label">@lang('label.city_name')</label>
                                               <input type="text"  name="town_city" class="form-control" >
                                                <div class="error d-none" id="error-town_city">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-post_code"  class="form-label">@lang('label.post_code')</label>
                                               <input type="text"  name="post_code" class="form-control" >
                                                <div class="error d-none" id="error-post_code">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-phone"  class="form-label">@lang('label.phone')</label>
                                               <input type="text"  name="phone" class="form-control" >
                                                <div class="error d-none" id="error-phone">
                                                </div>
                                            </div>
                                        </div>
                                             

                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-country_id"  class="form-label">@lang('label.country')</label>
                                                     <select  id="parent-category_info_id" name="country_id" class="form-select">
                                                     <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($countrys as $country)
                                                    <option value="{{$country->id}}">@lang($country->name)</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                                         
                                    </div><!-- end row -->
                                    </div>
                                    </div>
                                    </div>
@php 
    $image_id = "app_log";
@endphp
                                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.image') @lang('title.app_log')</h4>
                                        <div class="row">
                                            <input type="file" id="{{$image_id}}-input" class="d-none" onchange="showimage(this)" />
                                            <div class="col-12 pb-2"><button type="button" onclick="document.getElementById('{{$image_id}}-input').click()" class="btn btn-light waves-effect waves-light w-sm">
                                                    <i class="mdi mdi-upload d-block font-size-16"></i> Upload
                                                </button></div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                   
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <img src="" id="{{$image_id}}-input-img" alt="" class="rounded avatar-md d-none" >
                                                            <input type="hidden" name="{{$image_id}}" id="{{$image_id}}-input-value">
                                                            
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                         
                                        </div>
                                          <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                               
                                    </div>


                                </div>
                            </div>
                            @php 
    $image_id = "app_fev_icon";
@endphp
                                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.image') @lang('title.fav_icon')</h4>
                                        <div class="row">
                                            <input type="file" id="{{$image_id}}-input" class="d-none" onchange="showimage(this)" />
                                            <div class="col-12 pb-2"><button type="button" onclick="document.getElementById('{{$image_id}}-input').click()" class="btn btn-light waves-effect waves-light w-sm">
                                                    <i class="mdi mdi-upload d-block font-size-16"></i> Upload
                                                </button></div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                   
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <img src="" id="{{$image_id}}-input-img" alt="" class="rounded avatar-md d-none" >
                                                            <input type="hidden" name="{{$image_id}}" id="{{$image_id}}-input-value">
                                                            
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                         
                                        </div>
                                          <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                               
                                    </div>


                                </div>
                            </div>



                              
 </form>