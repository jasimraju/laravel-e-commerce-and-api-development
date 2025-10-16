   <form action="{{route('admin.add.product.halal')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-hala_info_id" class="form-label">@lang('label.authority') @lang('label.name')
                                                    <span class="text-danger">*</span></label>
		                                     
                                                <select  id="parent-hala_info_id" name="hala_info_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($halal_org_list as $halal_org)
                                                    <option value="{{$halal_org->id}}" @if(!empty($is_update) && $halal_org->id == $is_update->hala_info_id)  selected @endif>{{$halal_org->authority}}</option>
                                                    @endforeach
                                                    
                                                </select>
		                                        <div class="error d-none" id="error-hala_info_id">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-product_info_id"  class="form-label">@lang('label.product')<span class="text-danger">*</span></label>
                                                 <select  id="parent-product_info_id" name="product_info_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($productlist as $product)
                                                    <option value="{{$product->id}}" @if(!empty($is_update) && $product->id == $is_update->product_info_id)  selected @endif>{{$product->product_name}}</option>
                                                     @endforeach
                                                 </select>
                                                <div class="error d-none" id="error-product_info_id">
		                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-product_info_id"  class="form-label">@lang('label.product')<span class="text-danger">*</span></label>
                                                   <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" name="halal_exipirydate" data-date-autoclose="true">
                                                <div class="error d-none" id="error-product_info_id">
                                                </div>
                                            </div>
                                        </div>
                            
                                         

                                   
     <div class="col-12">
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                                  
                                  
                                          </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                              
 </form>