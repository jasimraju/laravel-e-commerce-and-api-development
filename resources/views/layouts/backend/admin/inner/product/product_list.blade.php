<style type="text/css">
    table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; // ***********add this
  word-wrap:break-word; // ***********and this
}
td { white-space:pre-wrap; 
    word-wrap:break-word }
</style>
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$sub_title}}</h4>
                             
                                 <div class="">
                                <table id="datatable-buttons" class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                        <tr>
                                        	<th scope="col" style="width: 70px;">#</th>
                                            <th>@lang('label.name')</th>
                                            <th>@lang('label.display_name')</th>
                                            <th class="w-50">@lang('label.descripiton')</th>
                                            <th>@lang('category.category')</th>
                                            <th>@lang('label.varient')</th>
                                            <th>@lang('label.halal_certification')</th>
                                            <th>@lang('label.status')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($productlist as $product)
                                    <tr>
                                    	<td>
                                                            <div>
                                                            	@foreach($product->image as $image)                
                                                            	{!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div>
                                                        </td>
                                    	<td lass="table_name">{{$product->product_name}}</td>
                                    	<td class="table_name" data-bs-toggle="tooltip" data-bs-html="true" title="{{$product->online_display_name}}">{{$product->online_display_name}}</td>
                                    	<td class="table_description" data-bs-toggle="tooltip" data-bs-html="true" title="{{$product->online_key_information}}">{{$product->online_key_information}} </td>
                                        <td>@lang($product->category->language_file_name.'.'.$product->category->name)</td>
                                        <td>{{$product->varient->count()}}<span class="badge bg-success mx-2" role="button" data-url="{{route('admin.add.products.variant',$product->id)}}" data-viewport="main-sub-view" data-active-url = "{{route('admin.add.products.variant')}}" onclick="showview(this,1)">@lang('label.add')</span><span class="badge bg-success" role="button" data-url="{{route('admin.list.product.variant',$product->id)}}" data-viewport="main-sub-view" data-active-url = "{{route('admin.list.product.variant')}}" data-callback="datatable_config" onclick="showview(this,1)">@lang('label.list')</span></td>
                                        <td>@if(!empty($product->halal)) @foreach($product->halal as $halal)  @php $timestamp = strtotime($halal->pivot->halal_exipirydate) @endphp {{$halal->authority}}({{date("d/m/Y",$timestamp)}}) @endforeach @endif<span class="badge bg-success mx-2" role="button" data-url="{{route('admin.add.product.halal',$product->id)}}" data-viewport="main-sub-view" data-active-url = "{{route('admin.add.product.halal')}}" onclick="showview(this)">@lang('label.add')</span> </td>
                                    	<td>@if($product->status == 1)<span class="badge bg-success">@lang('label.active')</span>@else<span class="badge bg-danger">@lang('label.inactive')</span> @endif </td>
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-html="true" title="@lang('title.edit')" onclick="showview(this)"
data-url="{{route('admin.add.products',$product->id)}}" data-viewport="main-sub-view" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                 </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                    </tr>	
                                    @endforeach
                                    <tbody>
                                                                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
