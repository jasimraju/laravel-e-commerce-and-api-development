 
                                        <div class="mt-4 mt-xl-0">
                                            <h4 id="label-varient_id" class="font-size-14 mb-3">@lang('label.varient') @lang('label.search')</h4>
                                            <div class="docs-options">
                                          
                                                   <select name="varient_id[]" class="select2 form-control select2-multiple"  data-url="{{route('admin.weeklydeal.product_varient',5)}}" id="varient_list" data-viewport="product-varient-view" data-callback="select2_config" onchange="select_change_product(this,2)" data-type="5" data-id-list="varient_list-product_list-supplier_list-catgory_list-band_list-" data-placeholder="Choose ..." multiple="multiple">
                                                    @foreach($varient_list as $varient)
                                                    @if(empty($varient['discount']))
                                                         <option value="{{$varient['varient_id']}}" @if(!empty($varientlistdata) && isset($varientlistdata)) @if(in_array($varient['varient_id'], $varientlistdata)) selected @endif @endif>{{$varient['name']}}</option>
                                                         @endif
                                                         @endforeach
                                                   
                                                
                                                </select>
                                                <div class="error d-none" id="error-varient_id">
                                            </div>

                                        </div>

                                        <div class="mt-4 mt-xl-0" >
                                            <h4 class="font-size-14 py-2 mb-3">@lang('label.varient') @lang('label.list')</h4>
                                            <div class="docs-toggles">
                                                <ul class="list-group" id="varient_list_show">
                                                    @if(empty($varientlistdata) || !isset($varientlistdata))
                                                         @foreach($varient_list as $varient)
                                                    @if(empty($varient['discount']))
                                                    <li class="list-group-item" id="div-varient-list-{{$varient['varient_id']}}">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="input-data-{{$varient['varient_id']}}" data-id="varient_list" type="checkbox" name="container" value="{{$varient['varient_id']}}">
                                                            <label class="form-check-label" for="container">{{$varient['name']}}</label>
                                                        </div>
                                                    </li>
                                                    @endif
                                                         @endforeach
                                                         @else

                                                         @foreach($varient_list as $varient)
                                                    @if(empty($varient['discount']))
                                                    @if(!empty($varientlistdata) && isset($varientlistdata)) @if(in_array($varient['varient_id'], $varientlistdata))
                                                    <li class="list-group-item" id="div-varient-list-{{$varient['varient_id']}}">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="input-data-{{$varient['varient_id']}}" type="checkbox" data-id="varient_list" value="{{$varient['varient_id']}}" onchange="changeingdata(this)"  data-text="{{$varient['name']}}" checked>
                                                            <label class="form-check-label" for="container">{{$varient['name']}}</label>
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