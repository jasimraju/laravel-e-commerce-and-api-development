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
                                            <th>@lang('label.descripiton')</th>
                                            <th>@lang('category.category')</th>
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
                                    	<td>{{$product->product_name}}</td>
                                    	<td>{{$product->online_display_name}}</td>
                                    	<td>{{$product->online_key_information}} </td>
                                        <td>@lang($product->category->language_file_name.'.'.$product->category->name)</td>
                                    	<td>@if($product->status == 1)<span class="badge bg-success">@lang('label.active')</span>@else<span class="badge bg-danger">@lang('label.inactive')</span> @endif </td>
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="#" title="@lang('title.edit')" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
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
