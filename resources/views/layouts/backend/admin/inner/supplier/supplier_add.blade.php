@if(!isset($supplier_object))
@php 
$supplier_object = null; 
$a_url = route('admin.add.supplier');
@endphp
@else
@php 
$a_url = route('admin.add.supplier',$supplier_object->id);
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
		                                        <label  id="label-supplier_name" class="form-label">
                                                    @lang('label.name')
                                                    <span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-supplier_name" name="supplier_name" @if(!empty($supplier_object)) value=" {{$supplier_object->supplier_name ?? '' }}" @endif  class="form-control" >
		                                        <div class="error d-none" id="error-supplier_name">
		                                        </div>
		                                    </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-supplier_code" class="form-label">@lang('label.company') @lang('label.code')
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" id="parent-supplier_code" name="supplier_code" class="form-control" @if(!empty($supplier_object)) value=" {{$supplier_object->supplier_code ?? '' }}" @endif >
                                                <div class="error d-none" id="error-supplier_code">
                                                </div>
                                            </div>
                                    </div>
                                     <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-country_id" class="form-label">@lang('label.country') @lang('label.name')</label>
                                                <select  id="parent-country_id" name="country_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($countrylist as $country)
                                                    <option value="{{$country->id}}" @if(!empty($supplier_object) && $supplier_object->country_id ==$country->id ) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-supplier_details"  class="form-label">@lang('label.descripiton')<span class="text-danger">*</span></label>
                                                <textarea type="text"  name="supplier_details" id="parent-supplier_details" class="form-control" >@if(!empty($supplier_object)){{$supplier_object->supplier_details ?? '' }} @endif</textarea>
                                                <div class="error d-none" id="error-supplier_details">
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
                                            $image_id_part = "band_log";
                                            $image_id_name = "band_log";
                                            @endphp
                                            @if(!empty($supplier_object))
                                    @include('layouts.backend.admin.inner.image.edit_image',$images = $supplier_object )
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