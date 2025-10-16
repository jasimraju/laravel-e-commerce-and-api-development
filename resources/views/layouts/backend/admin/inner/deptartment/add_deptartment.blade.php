@if(!isset($dep_object))
@php 
$dep_object = null; 
$a_url = route('admin.add.deptartment');
@endphp
@else
@php 
$a_url = route('admin.add.deptartment',$dep_object->id);
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
		                                        <label  id="label-name" class="form-label">@lang('label.name')
                                                    <span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-name" name="name" class="form-control" @if(!empty($dep_object)) value="{{$dep_object->name}}" @endif >
		                                        <div class="error d-none" id="error-name">
		                                        </div>
		                                    </div>
                                    </div>
                                          <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-div_info_id" class="form-label">@lang('label.division') @lang('label.name') <span class="text-danger">*</span></label>
                                                <select  id="parent-div_info_id" name="div_info_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($divisions as $division)
                                                    <option value="{{$division->id}}" @if(!empty($dep_object) && $dep_object->div_info_id == $division->id ) selected @endif>{{$division->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-div_info_id">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-description"  class="form-label">@lang('label.descripiton')</label>
                                                <textarea type="text"  name="description" id="parent-description" class="form-control" >@if(!empty($dep_object)) {{$dep_object->description ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-description">
		                                        </div>
                                            </div>
                                        </div>
                            
                                         
                                    </div><!-- end row -->
                                       <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">@lang('button.submit')</button>
                                        <button type="button" class="btn btn-danger w-md">@lang('button.back')</button>
                                    </div>

                                  
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                              
 </form>