   <form action="{{route('admin.add.slider')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-authority" class="form-label">@lang('label.slider_title')</label>
		                                        <input type="text" id="parent-title" name="title" class="form-control" >
		                                        <div class="error d-none" id="error-title">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-description"  class="form-label">@lang('label.descripiton')</label>
                                                <textarea type="text"  name="description" id="parent-description" class="form-control" ></textarea>
                                                <div class="error d-none" id="error-description">
		                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-tag_line"  class="form-label">@lang('label.tag_line')</label>
                                                 <input type="text" id="parent-tag_line" name="tag_line" class="form-control" >
                                                <div class="error d-none" id="error-tag_line">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-type"  class="form-label">@lang('label.slider_for_which_page')</label>
                                                <select  id="parent-type" name="type" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($pagelist as $page)
                                                    <option value="{{$page->id}}">@lang($page->title)</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-type">
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
                                        <h4 class="card-title mb-4">@lang('title.add_button')(@lang('label.optional'))</h4>
                                          <div class="row">
                                            <div class="col-12 row">
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-authority" class="form-label">@lang('label.title') @lang('label.name')
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"  name="button_title[]" class="form-control" >
                                                <div class="error d-none" id="error-authority">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-title"  class="form-label">@lang('label.chose_link')<span class="text-danger">*</span></label>
                                                     <select  id="parent-category_info_id" name="button_link[]" class="form-select">
                                                     <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($pagelist as $page)
                                                    <option value="{{$page->id}}">@lang($page->title)</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-authority" class="form-label">@lang('label.title') @lang('label.name')
                                                   </label>
                                                <input type="text"  name="button_title[]" class="form-control" >
                                                <div class="error d-none" id="error-authority">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-title"  class="form-label">@lang('label.chose_link')</label>
                                                     <select  id="parent-category_info_id" name="button_link[]" class="form-select">
                                                     <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($pagelist as $page)
                                                    <option value="{{$page->id}}">@lang($page->title)</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-title">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                                       <div class="col-12"><i  onclick="addhtml()" style="cursor: pointer;" class="fas fa-plus-square d-block check-nav-icon mt-4 mb-2 float-end"></i></div>  
                                    </div><!-- end row -->
                                    </div>
                                    </div>
                                    </div>
@php 
    $image_id = "slider_image";
@endphp
                                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.image')</h4>
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