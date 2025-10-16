<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$sub_title}}</h4>
                             
                                 <div class="">
                                <table id="datatable-buttons" class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                        <tr>
                                        	                                            <th>@lang('label.name')</th>
                                            <th>@lang('label.email')</th>
                                            <th>@lang('label.country')</th>
                                            <th>@lang('label.phone')</th>
                                            <th>@lang('label.total') @lang('label.orders')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                         <tbody>
                                    @foreach($customers as $customer)
                                    <tr>
                                    	<td>
                                        {{$customer->first_name}} {{$customer->last_name}}
                                                        </td>
                                    	<td>{{$customer->email}}</td>
                                    	<td>{{$customer->country->name ?? ''}}</td>
                                    	<td>{{$customer->phone}}</td>
                                    	<td >@if($customer->orderlist_count != 0) <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-html="true" title="@lang('title.view_order_details')" data-url="{{route('admin.order.customer',$customer->id)}}" data-viewport="main-sub-view" onclick="showview(this)">{{$customer->orderlist_count}}</a> @else @lang('title.no_order_given') @endif</td>
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                            
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript:void(0)" onclick="delete_data(this)" data-url="{{route('admin.delete.customer',$customer->id)}}" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                    </tr>	
                                    @endforeach
                               
                                                                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
