@if(!isset($catgory))
@php 
$catgory = null; 
$a_url = route('admin.add.category');
@endphp
@else
@php 
$a_url = route('admin.add.category',$catgory->id);
@endphp
@endif


   <form action="{{$a_url}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-name" class="form-label">@lang('label.name')<span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-name" name="name" class="form-control" @if(!empty($catgory))  value="@lang($catgory->language_file_name.'.'.$catgory->name)"  @endif>
		                                        <div class="error d-none" id="error-name">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-description"  class="form-label">@lang('label.descripiton')<span class="text-danger">*</span></label>
                                                <textarea type="text"  name="description" id="parent-description" class="form-control" >@if(!empty($catgory)) @lang($catgory->language_file_name.'.'.$catgory->description) @endif</textarea>
                                                <div class="error d-none" id="error-description">
		                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-bg_color" class="form-label">@lang('label.bg_color')<span class="text-danger">*</span></label>
                                                <input type="text" name="bg_color" id="parent-bg_color" class="form-control" @if(!empty($catgory)) value="{{$catgory->bg_color}}" @endif>
                                                <div class="error d-none" id="error-bg_color">
		                                        </div>
                                            </div>
                                        </div>
                                 

                                  
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-more_details" class="form-label">@lang('label.more_details')</label>
                                                <textarea name="more_details" id="parent-more_details" class="form-control" rows="3" >@if(!empty($catgory)) @lang($catgory->language_file_name.'.'.$catgory->more_details) @endif</textarea>
                                                <p class="text-muted mt-2">
                                        
                                    </p>
                                                <div class="error d-none" id="error-more_details">
		                                        </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-status" class="form-label">@lang('label.status')</label>
                                                <select  id="parent-status" name="status" class="form-select">
                                                    <option value="1" selected>@lang('label.active')</option>
                                                    <option value="2">@lang('label.inactive')</option>
                                                </select>
                                                <div class="error d-none" id="error-status">
		                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-parent_id" class="form-label">@lang('label.parent') @lang('category.category')</label>
                                                <select  id="parent-parent_id" name="parent_id" class="form-select">
                                                	<option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($categorylist as $category)
                                                    <option value="{{$category->id}}" @if(!empty($catgory) && $catgory->parent_id ==  $category->id) selected @endif>@lang($category->language_file_name.'.'.$category->name)</option>
                                                    @endforeach
                                                	
                                                </select>
                                                <div class="error d-none" id="error-menu_id">
		                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="language_file_name" value="category">

                                  
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.image')</h4>
                                        <div class="row">
                                            @php
                                            $image_id_part = "category-image";
                                            $image_id_name = "category_image";
                                            @endphp
                                            @if(!empty($catgory))
                                    @include('layouts.backend.admin.inner.image.edit_image',$images = $catgory )
                                  @else
                                    @include('layouts.backend.admin.inner.image.add_image')
                                  @endif
                                         
                                        </div>
                                          <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                               
                                    </div>
                                </div>
                            </div>
 </form>