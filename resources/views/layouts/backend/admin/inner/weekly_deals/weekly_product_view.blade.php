  
                                        <div class="mt-4 mt-xl-0">
                                            <h4 class="font-size-14 mb-3">@lang('label.product') @lang('label.search')</h4>
                                            <div class="docs-options">
                                          
                                                   <select  class="select2 form-control select2-multiple"  data-placeholder="Choose ..." data-url="{{route('admin.weeklydeal.product_varient',4)}}"  data-viewport="product-varient-view" data-callback="select2_config" onchange="select_change_product(this,1)" data-type="4" id="product_list" data-id-list="varient_list-product_list-supplier_list-catgory_list-band_list-" multiple="multiple">
                                                    @foreach($product_list as $product)
                                                    @if(empty($product['discount']))
                                                         <option value="{{$product['product_id']}}" @if(!empty($productlistdata) && isset($productlistdata)) @if(in_array($product['product_id'], $productlistdata)) selected @endif @endif>{{$product['name']}}</option>
                                                         @endif
                                                         @endforeach
                                                   
                                                
                                                </select>
                                            </div>

                                        </div>
                                        <div class="mt-4 mt-xl-0">
                                            <h4 class="font-size-14 py-2 mb-3">@lang('label.product') @lang('label.list')</h4>
                                            <div class="docs-options">
                                                 <div class="docs-toggles">
                                                <ul class="list-group" id="product_list_show">
                                                    @if(empty($productlistdata) || !isset($productlistdata))
                                                        @foreach($product_list as $product)
                                                        @if(empty($product['discount']))

                                                        <li class="list-group-item" id="div-product-list-{{$product['product_id']}}">
                                                        <div class="form-check">
                                                            <input class="form-check-input" onchange="changeingdata(this)" value="{{$product['product_id']}}" data-id="product_list" type="checkbox" name="container">
                                                            <label class="form-check-label" for="container">{{$product['name']}}</label>
                                                        </div>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                        @else
                                                            @foreach($product_list as $product)
                                                        @if(empty($product['discount']))
                                                        @if(!empty($productlistdata) && isset($productlistdata)) @if(in_array($product['product_id'], $productlistdata))
                                                        <li class="list-group-item" id="div-product-list-{{$product['product_id']}}">
                                                        <div class="form-check" >
                                                            <input class="form-check-input w-product-list" onchange="changeingdata(this)" value="{{$product['product_id']}}" type="checkbox" data-id="product_list" checked>
                                                            <label class="form-check-label" id="w-product-list-{{$product['product_id']}}" for="container">{{$product['name']}}</label>
                                                        </div>
                                                        </li>
                                                        @endif
                                                        @endif
                                                        @endif
                                                        @endforeach

                                                        @endif

                                                    
                                                   
                                                </ul>
                                            </div>                                            
                                            
                                             
                                            </div>
                                        </div>
                                    