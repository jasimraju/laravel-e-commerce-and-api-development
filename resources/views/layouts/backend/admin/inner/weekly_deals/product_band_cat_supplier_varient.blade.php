   <form action="{{route('admin.add.weeklydeal')}}" id="menu-save-form">

   <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$sub_title}}</h4>
                                <!-- <p class="card-title-desc"> </p> -->
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="font-size-14 mb-3">@lang('label.select_start_and_end_date')</h5>
                                        <div>
                                            <input type="text" class="form-control date-range" id="range"  name="start_end_date" />
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-1">@lang('label.note')</h5>
                                            <p class="text-muted mb-2">
                                        Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                                    </p>
                                            <div>
                                              <textarea class="form-control" name="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5 id="label-p_or_amount" class="font-size-14 py-2 mb-3">@lang('label.percentage_fixed')</h5>
                                        <div>
                                            
                                           <input data-toggle="touchspin"  id="touchspin-input" type="text" data-step="1.0" data-decimals="2" name="p_or_amount" data-bts-postfix="%" class="form-control">
                                           
                                        </div>
                                        <div class="error d-none" id="error-p_or_amount"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 id="label-type" class="font-size-14 py-2 mb-3">@lang('label.type')</h5>
                                            <div>
                                                 <select class="form-control" data-change-id="touchspin-input" name="type" data-change-attr-name="data-bts-postfix" data-classname="input-group-text" id="parent-type" onchange="changeingdata(this)">
                                                    <option>@lang('label.choose')</option>
                                                    <option selected value="1" data-text="%">@lang('label.percentage')</option>
                                                    <option value="2" data-text="F">@lang('label.fixet')</option>
                                                 </select>
                                                 <div class="error d-none" id="error-type">
                                              
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>
                </div>




<!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">@lang('title.discount_by')</h4>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h4 class="font-size-14 mb-3">@lang('label.categories') @lang('label.list')</h4>
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                   <select  class="select2 form-control select2-multiple" multiple="multiple" data-url="{{route('admin.weeklydeal.product_varient',1)}}"  data-viewport="product-varient-view" data-callback="select2_config" onchange="select_change(this)" data-type="1" id="catgory_list" data-id-list="varient_list-product_list-supplier_list-catgory_list-band_list-" data-placeholder="Choose ...">
                                                          @foreach($catgorise_list as $catgory)
                                                         <option value="{{$catgory['id']}}">{{$catgory['name']}}</option>
                                                        @endforeach
                                                   
                                                
                                                </select>
                                                </div>
                                                <div class="docs-datepicker-container"></div>
                                            </div>
                                        </div>
                                         <div class="py-4">
                                            <h4 class="font-size-14 mb-3">@lang('label.supplier') @lang('label.list')</h4>
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                    <select  class="select2 form-control select2-multiple" multiple="multiple"  data-url="{{route('admin.weeklydeal.product_varient',2)}}"  data-viewport="product-varient-view" data-callback="select2_config" onchange="select_change(this)" data-callback="select2_config" data-type="2" id="supplier_list" data-id-list="varient_list-product_list-supplier_list-catgory_list-band_list-" data-placeholder="Choose ...">
                                                       @foreach($supplier_list as $supplier)
                                                       <option value="{{$supplier['id']}}">{{$supplier['supplier_name']}}</option>
                                                       @endforeach
                                                   
                                                
                                                </select>
                                                    
                                                </div>
                                                <div class="docs-datepicker-container"></div>
                                            </div>
                                        </div>
                                         <div class="py-4">
                                            <h4 class="font-size-14 mb-3">@lang('label.bands') @lang('label.list')</h4>
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                      <select  class="select2 form-control select2-multiple" data-url="{{route('admin.weeklydeal.product_varient',3)}}"  data-viewport="product-varient-view" data-callback="select2_config"  onchange="select_change(this)" data-type="3" id="band_list" data-id-list="varient_list-product_list-supplier_list-catgory_list-band_list-" multiple="multiple" data-placeholder="Choose ...">
                                                           @foreach($band_list as $band)
                                                       <option value="{{$band['id']}}">{{$band['name']}}</option>
                                                       @endforeach
                                                   
                                                
                                                </select>
                                                </div>
                                                <div class="docs-datepicker-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 row" id="product-varient-view">
                                        @include($main_view_port_folder.'.weekly_product_varient_view')
                                  
                                </div>
                                </div>
                                 <div class="col-lg-12">
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md float-right">Submit</button>
                                        <button type="button" class="btn btn-danger w-md float-right">Back</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </form>