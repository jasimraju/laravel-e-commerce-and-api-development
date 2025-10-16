@if(!isset($halal_object))
@php 
$halal_object = null; 
$a_url = route('admin.add.halal');
@endphp
@else
@php 
$a_url = route('admin.add.halal',$halal_object->id);
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
		                                        <label  id="label-authority" class="form-label">@lang('label.authority') @lang('label.name')
                                                    <span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-authority" name="authority" class="form-control" @if(!empty($halal_object)) value="{{$halal_object->authority ?? ''}}" @endif >
		                                        <div class="error d-none" id="error-authority">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-title"  class="form-label">@lang('label.descripiton')<span class="text-danger">*</span></label>
                                                <textarea type="text"  name="title" id="parent-title" class="form-control" >@if(!empty($halal_object)) {{$halal_object->title ?? ''}} @endif</textarea>
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
                                        <h4 class="card-title mb-4">@lang('title.image')</h4>
                                        <div class="row">
                                                       @php
                                            $image_id_part = "halal_log";
                                            $image_id_name = "halal_log";
                                            @endphp
                                            @if(!empty($halal_object))
                                    @include('layouts.backend.admin.inner.image.edit_image',$images = $halal_object )
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