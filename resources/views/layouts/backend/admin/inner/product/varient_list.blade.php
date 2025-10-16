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
                                            <th>@lang('label.varient_name')</th>
                                            <th>@lang('label.purchase_price')</th>
                                            <th>@lang('label.gp_percentage')</th>
                                            <th>@lang('label.product_sku')</th>
                                            <th>@lang('label.unit_qty')</th>
                                            <th>@lang('label.unit_name')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($product as $pro)
                                    @foreach($pro->varient as $varient)
                                    <tr>
                                    	<td>
                                                            <div>
                                                            	@foreach($varient->image as $image)                
                                                            	{!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div>
                                                        </td>
                                    	<td>{{$varient->varient_name}}</td>
                                        <td>{{$varient->rsp_w_gst}}</td>
                                    	<td>{{$varient->gp_percentage}}</td>
                                    	<td>{{$varient->product_sku}} </td>
                                        
                                    	<td>{{$varient->unit_of_quantity}} </td>
                                        <td>{{$pro->unit->unit_name}} </td>
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
                                    @endforeach
                                    <tbody>
                                                                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
