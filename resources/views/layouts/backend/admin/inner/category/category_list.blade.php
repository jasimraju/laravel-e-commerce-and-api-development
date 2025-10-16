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
                                            <th>@lang('label.descripiton')</th>
                                            <th>@lang('label.parent') @lang('category.category')</th>
                                            <th>@lang('label.status')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($categorylist as $category)
                                    <tr>
                                    	<td>
                                                            <div>
                                                            	@foreach($category->image as $image)                
                                                            	{!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div>
                                                        </td>
                                    	<td>@lang($category->language_file_name.'.'.$category->name)</td>
                                    	<td class="table_description" >@lang($category->language_file_name.'.'.$category->description)</td>
                                    	<td>@if(!empty($category->parent->name)) @lang($category->language_file_name.'.'.$category->parent->name) @endif </td>
                                    	<td>@if($category->status == 1)<span class="badge bg-success">@lang('label.active')</span>@else<span class="badge bg-danger">@lang('label.inactive')</span> @endif </td>
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="#"  data-bs-toggle="tooltip" data-bs-html="true" title="@lang('title.edit')" onclick="showview(this)"
data-url="{{route('admin.add.category',$category->id)}}" data-viewport="main-sub-view"  data-callback="catgoryintial" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
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
