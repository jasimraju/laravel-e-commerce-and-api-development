@if(!empty($categorylist))

<div class="col-md-3">
    <label for="customRange1" class="form-label">Price range</label>
<input type="range" class="form-range" id="customRange1">
    
</div>


<div class="col-md-3">   <select class="form-select" id="product_cat_list" name="product_cat_list">
                              <option selected>@lang('title.all_category')</option>
                              @foreach($categorylist as $catlist)
                               <option value="{{$catlist->id}}">@lang($catlist->language_file_name.'.'.$catlist->name)</option>
                               @endforeach
                            </select></div>
                            @endif
                            @if(!empty($supplierlist))
  <div class="col-md-3">   <select class="form-select" id="product_cat_list" name="product_cat_list">
                              <option selected>@lang('label.select_supplier')</option>
                              @foreach($supplierlist as $supplier)
                               <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                               @endforeach
                            </select></div>
                            @endif
                            @if(!empty($brandlist))
                            <div class="col-md-3">   <select class="form-select" id="product_cat_list" name="product_cat_list">
                              <option selected>@lang('label.brand')</option>
                              @foreach($brandlist as $brand)
                               <option value="{{$brand->id}}">{{$brand->name}}</option>
                               @endforeach
                            </select></div>
                            @endif