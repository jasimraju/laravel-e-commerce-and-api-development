  @if(!isset($product_object))
@php 
$product_object = null; 
$a_url = route('admin.add.products');
@endphp
@else
@php 
$a_url = route('admin.add.products',$product_object->id);
@endphp
@endif

   <form action="{{route('admin.add.products')}}" id="menu-save-form">
  <div class="card">
                                  
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-product_name" class="form-label">@lang('label.name')<span class="text-danger">*</span></label>
		                                        <input type="text" id="parent-product_name" name="product_name" class="form-control" @if(!empty($product_object)) value=" {{$product_object->product_name ?? ''}}" @endif >
		                                        <div class="error d-none" id="error-product_name">
		                                        </div>
		                                    </div>
                                    </div>  
                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-online_display_name" class="form-label">@lang('label.display_name')<span class="text-danger">*</span></label>
                                                <input type="text" id="parent-online_display_name" name="online_display_name" class="form-control" @if(!empty($product_object)) value=" {{$product_object->online_display_name ?? ''}}" @endif >
                                                <div class="error d-none" id="error-online_display_name">
                                                </div>
                                            </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-online_key_information"  class="form-label">@lang('label.descripiton')<span class="text-danger">*</span></label>
                                                <textarea type="text"  name="online_key_information" id="parent-online_key_information" class="form-control" > @if(!empty($product_object)) {{$product_object->online_key_information ?? ''}} @endif </textarea>
                                                <div class="error d-none" id="error-online_key_information">
		                                        </div>
                                            </div>
                                        </div>
                                           <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-unit_id" class="form-label">@lang('label.unit_name')<span class="text-danger">*</span></label>
                                                <select  id="parent-unit_id" name="unit_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($unitlist as $unit)
                                                    <option value="{{$unit->id}}" @if(!empty($product_object) && $product_object->unit_id == $unit->id ) selected @endif>{{$unit->unit_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-unit_id">
                                                </div>
                                            </div>
                                        </div>
                                               <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-unit_qty" class="form-label">@lang('label.unit_qty')</label>
                                                <input type="text" id="parent-unit_qty" name="unit_qty" class="form-control" @if(!empty($product_object)) value=" {{$product_object->unit_qty ?? ''}}" @endif>
                                                <div class="error d-none" id="error-unit_qty">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-category_info_id" class="form-label">@lang('label.select_category')<span class="text-danger">*</span></label>
                                                <select  id="parent-category_info_id" name="category_info_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($categorylist as $category)
                                                    <option value="{{$category->id}}" @if(!empty($product_object) && $product_object->category_info_id == $category->id ) selected @endif>@lang($category->language_file_name.'.'.$category->name)</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-category_info_id">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-country_id" class="form-label">@lang('label.select_country')<span class="text-danger">*</span></label>
                                                <select  id="parent-country_id" name="country_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(!empty($product_object) && $product_object->country_id == $country->id ) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-country_id">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-band_info_id" class="form-label">@lang('label.brand')<span class="text-danger">*</span></label>
                                                <select  id="parent-band_info_id" name="band_info_id" class="form-select">
                                                    <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($brandlist as $brand)
                                                    <option value="{{$brand->id}}" @if(!empty($product_object) && $product_object->band_info_id == $brand->id ) selected @endif>{{$brand->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-band_info_id">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-item_gross_weight" class="form-label">@lang('label.item_gross_weight')</label>
                                                <input type="text" name="item_gross_weight"  class="form-control" @if(!empty($product_object)) value=" {{$product_object->item_gross_weight ?? ''}}" @endif >
                                                <div class="error d-none" id="error-item_gross_weight">
		                                        </div>
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-item_weight_unit_id" class="form-label">@lang('label.item_weight_unit_id')</label>
                                                  <select  id="parent-item_weight_unit_id" name="item_weight_unit_id" class="form-select">
                                                  <option value=" " selected >@lang('label.choose')</option>
                                                    @foreach($unitlist as $unit)
                                                    <option value="{{$unit->id}}" @if(!empty($product_object) && $product_object->item_weight_unit_id == $unit->id ) selected @endif>{{$unit->unit_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="error d-none" id="error-item_weight_unit_id">
                                                </div>
                                            </div>
                                        </div>

                                           <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-item_length" class="form-label">@lang('label.item_length')</label>
                                                <input type="text" name="item_length"  class="form-control" @if(!empty($product_object)) value=" {{$product_object->item_length ?? ''}}" @endif >
                                                <div class="error d-none" id="error-item_length">
                                                </div>
                                            </div>
                                        </div>
                                              <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-item_width" class="form-label">@lang('label.item_width')</label>
                                                <input type="text" name="item_width"  class="form-control" @if(!empty($product_object)) value=" {{$product_object->item_width ?? ''}}" @endif >
                                                <div class="error d-none" id="error-item_width">
                                                </div>
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-item_height" class="form-label">@lang('label.item_height')</label>
                                                <input type="text" name="item_height"  class="form-control" @if(!empty($product_object)) value=" {{$product_object->item_height ?? ''}}" @endif>
                                                <div class="error d-none" id="error-item_height">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-ingrdients" class="form-label">@lang('label.ingrdients')</label>
                                                <textarea type="text"  name="ingrdients" id="parent-ingrdients" class="form-control" >@if(!empty($product_object)) {{$product_object->ingrdients ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-ingrdients">
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-storage" class="form-label">@lang('label.storage')</label>
                                                <textarea type="text"  name="storage" id="parent-storage" class="form-control" >@if(!empty($product_object)) {{$product_object->storage ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-storage">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-nutrition_fact" class="form-label">@lang('label.nutrition_fact')</label>
                                                <textarea type="text"  name="nutrition_fact" id="parent-nutrition_fact" class="form-control" >@if(!empty($product_object)) {{$product_object->nutrition_fact ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-nutrition_fact">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-preparation" class="form-label">@lang('label.preparation')</label>
                                                <textarea type="text"  name="preparation" id="parent-preparation" class="form-control" >@if(!empty($product_object)) {{$product_object->preparation ?? ''}} @endif</textarea>
                                                <div class="error d-none" id="error-preparation">
                                                </div>
                                            </div>
                                        </div>
                                       
                                          
                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-no_expiry_data_rquired" class="form-label">@lang('label.no_expiry_data_rquired')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="no_expiry_data_rquired"  value="1" @if(!empty($product_object) && $product_object->no_expiry_data_rquired == 1) checked @endif>
                                        <label class="form-check-label" for="no_expiry_data_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="no_expiry_data_rquired"  value="2" @if(!empty($product_object) && $product_object->no_expiry_data_rquired == 2) checked @endif>
                                             <label class="form-check-label" for="no_expiry_data_rquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-no_expiry_data_rquired">
                                                </div>
                                            </div>
                                        </div>
                                          

                                           <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-odd_shape_article" class="form-label">@lang('label.odd_shape_article')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="odd_shape_article"  value="1" @if(!empty($product_object) && $product_object->odd_shape_article == 1) checked @endif>
                                        <label class="form-check-label" for="odd_shape_article_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="odd_shape_article"  value="2" @if(!empty($product_object) && $product_object->odd_shape_article == 2) checked @endif>
                                             <label class="form-check-label" for="odd_shape_article_rquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-odd_shape_article">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-hala" class="form-label">@lang('label.hala')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hala"  value="1" @if(!empty($product_object) && $product_object->hala == 1) checked @endif>
                                        <label class="form-check-label" for="hala_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="hala"  value="2" @if(!empty($product_object) && $product_object->hala == 2) checked @endif>
                                             <label class="form-check-label" for="hala_rquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-hala">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-organic" class="form-label">@lang('label.organic')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="organic"  value="1" @if(!empty($product_object) && $product_object->organic == 1) checked @endif>
                                        <label class="form-check-label" for="organic_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="organic"  value="2" @if(!empty($product_object) && $product_object->organic == 2) checked @endif>
                                             <label class="form-check-label" for="organic_rquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-organic">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-healthier_choice" class="form-label">@lang('label.healthier_choice')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="healthier_choice"  value="1" @if(!empty($product_object) && $product_object->healthier_choice == 1) checked @endif>
                                        <label class="form-check-label" for="healthier_choice_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="healthier_choice"  value="2" @if(!empty($product_object) && $product_object->healthier_choice == 2) checked @endif>
                                             <label class="form-check-label" for="healthier_choice_rquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-healthier_choice">
                                                </div>
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <p  id="label-healther_drink" class="form-label">@lang('label.healther_drink')</p>
                                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="healther_drink"  value="1" @if(!empty($product_object) && $product_object->healther_drink == 1) checked @endif>
                                        <label class="form-check-label" for="healther_drink_rquired1">@lang('label.yes')</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="healther_drink"  value="2" @if(!empty($product_object) && $product_object->healther_drink == 2) checked @endif>
                                             <label class="form-check-label" for="healther_drinkrquired2">@lang('label.no')</label>
                                            </div>
                                                <div class="error d-none" id="error-healther_drink">
                                                </div>
                                            </div>
                                        </div>

                                  
                                        
                                        

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-status" class="form-label">@lang('label.status')</label>
                                                <select  id="parent-status" name="status" class="form-select">
                                                    <option value="1" @if(!empty($product_object) && $product_object->status == 1) selected @endif >@lang('label.active')</option>
                                                    <option value="2" @if(!empty($product_object) && $product_object->status == 2) selected @endif>@lang('label.inactive')</option>
                                                </select>
                                                <div class="error d-none" id="error-status">
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