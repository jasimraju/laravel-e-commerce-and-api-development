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
                                            <th>@lang('label.number')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($product_classes as $product_class)
                                    <tr>
                                    	<td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{ substr($product_class->name, 0, 2)}}
                                                                </span>
                                                            </div>
                                                        </td>
                                    	<td>{{$product_class->name}}</td>
                                    	<td>{{$product_class->number}}</td>
                                    	
                                    	
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
