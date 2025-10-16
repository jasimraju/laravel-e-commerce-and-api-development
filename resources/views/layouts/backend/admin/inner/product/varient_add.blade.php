   <form action="{{route('admin.add.products.variant')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-product_info_id" class="form-label">@lang('label.product_name')<span class="text-danger">*</span></label>
		                                        <select  id="parent-product_info_id" onchange="showdata(this)" name="product_info_id" data-url="{{route('admin.showuniqe.products')}}" data-change-id ="#parent-unit_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($productlist as $product)
                                                    <option value="{{$product->id}}" @if(!empty($product_id))
                                                            @if($product_id->id == $product->id) selected @endif
                                                        @endif>{{$product->product_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
		                                        <div class="error d-none" id="error-product_info_id">
		                                        </div>
		                                    </div>
                                    </div>  
                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-varient_name" class="form-label">@lang('label.varient_name')<span class="text-danger">*</span></label>
                                                <input type="text" id="parent-varient_name" name="varient_name" class="form-control" >
                                                <div class="error d-none" id="error-varient_name">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-weight"  class="form-label">@lang('label.weight')<span class="text-danger">*</span></label>
                                                 <input type="text" id="parent-weight" name="weight" class="form-control" >
                                                <div class="error d-none" id="error-weight">
		                                        </div>
                                            </div>
                                        </div>
                                           <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-unit_id" class="form-label">@lang('label.unit_name')</label>
                                                <select  id="parent-unit_id" name="unit_id" class="form-select">
                                                  <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($unitlist as $unit)
                                                <option value="{{$unit->id}}" @if(!empty($product_id))
                                                            @if($product_id->unit_id == $unit->id) selected @endif
                                                        @endif>{{$unit->unit_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-unit_id">
                                                </div>
                                            </div>
                                        </div>


                                               <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-unit_of_quantity" class="form-label">@lang('label.unit_qty')</label>
                                                <input type="text" id="parent-unit_of_quantity" name="unit_of_quantity" class="form-control" >
                                                <div class="error d-none" id="error-unit_of_quantity">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-supplier_id" class="form-label">@lang('label.select_supplier') <span class="text-danger">*</span></label>
                                                <select  id="parent-supplier_id" name="supplier_id" class="form-select">
                                                     <option value=" " selected >@lang('label.choose')</option>
                                                     @foreach($supplierlist as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-supplier_id">
                                                </div>
                                            </div>
                                        </div>
                                       
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-per_serving_measure" class="form-label">@lang('label.per_serving_measure')</label>
                                                <textarea type="text"  name="per_serving_measure" id="parent-per_serving_measure" class="form-control" ></textarea>
                                                <div class="error d-none" id="error-per_serving_measure">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-per_serving_measure_unit" class="form-label">@lang('label.per_serving_measure_unit')</label>
                                                  <select  id="parent-per_serving_measure_unit" name="per_serving_measure_unit" class="form-select">
                                                    
                                                     <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($unitlist as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-item_weight_unit_id">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-packet_size" class="form-label">@lang('label.packet_size')</label>
                                                 <input type="text" id="parent-packet_size" name="packet_size" class="form-control" >
                                               
                                                <div class="error d-none" id="error-packet_size">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-packet_size_unit_id" class="form-label">@lang('label.packet_size_unit_id')</label>
                                                <select  id="parent-packet_size_unit_id" name="packet_size_unit_id" class="form-select">
                                              <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($unitlist as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-packet_size_unit_id">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-carton_pack_size" class="form-label">@lang('label.carton_pack_size')</label>
                                                 <input type="text" id="parent-carton_pack_size" name="carton_pack_size" class="form-control" >
                                               
                                                <div class="error d-none" id="error-carton_pack_size">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-color" class="form-label">@lang('label.color')</label>
                                                 <input type="text" id="parent-color" name="color" class="form-control" >
                                               
                                                <div class="error d-none" id="error-color">
                                                </div>
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-size" class="form-label">@lang('label.size')</label>
                                                 <input type="text" id="parent-size" name="size" class="form-control" >
                                               
                                                <div class="error d-none" id="error-size">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-rsp_w_gst" class="form-label">@lang('label.rsp_w_gst')<span class="text-danger">*</span></label>
                                                 <input type="text" id="parent-rsp_w_gst" name="rsp_w_gst" class="form-control" >
                                               
                                                <div class="error d-none" id="error-rsp_w_gst">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-gp_percentage" class="form-label">@lang('label.gp_percentage')<span class="text-danger">*</span></label>
                                                 <input type="text" id="parent-gp_percentage" name="gp_percentage" class="form-control" >
                                               
                                                <div class="error d-none" id="error-gp_percentage">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-product_sku" class="form-label">@lang('label.product_sku')</label>
                                                 <input type="text" id="parent-product_sku" name="product_sku" class="form-control" >
                                               
                                                <div class="error d-none" id="error-product_sku">
                                                </div>
                                            </div>
                                        </div>
                                         
                                       
                                    </div>
                                  

                                  
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">@lang('title.image')</h4>
                                     <div class="row">
                                            <input type="file" id="category-image-input" data-multiple="yes" class="d-none" onchange="showimage(this)" />
                                            <div class="col-12 pb-2"><button type="button" onclick="document.getElementById('category-image-input').click()" class="btn btn-light waves-effect waves-light w-sm">
                                                    <i class="mdi mdi-upload d-block font-size-16"></i> Upload
                                                </button></div>
                                            <div class="col-md-6">
                                                <div class="row" id="category-image-input-show">
                                                   
                                                  
                                                  
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