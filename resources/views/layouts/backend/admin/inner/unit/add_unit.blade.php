@if(!isset($unit_object))
@php 
$unit_object = null; 
$a_url = route('admin.add.unit');
@endphp
@else
@php 
$a_url = route('admin.add.unit',$unit_object->id);
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
		                                        <label  id="label-unit_name" class="form-label">@lang('label.name')
                                                    <span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-unit_name" name="unit_name" class="form-control" @if(!empty($unit_object )) value="{{$unit_object ->unit_name}}" @endif >
		                                        <div class="error d-none" id="error-unit_name">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-description"  class="form-label">@lang('label.descripiton')</label>
                                                <textarea type="text"  name="description" id="parent-description" class="form-control" >@if(!empty($unit_object )) {{$unit_object ->description ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-description">
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