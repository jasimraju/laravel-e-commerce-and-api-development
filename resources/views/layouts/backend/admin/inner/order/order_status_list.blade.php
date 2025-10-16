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
                                            <th>@lang('label.descripiton')</th>
                                            <th>@lang('label.defult') </th>
                                             <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                   @foreach($order_status as $orderstatus)
                                   <tr>
                                  
                                       <td>{{ $orderstatus->name}}</td>
                                       <td>{{ $orderstatus->description}}</td>
                                       <td>@if($orderstatus->type == 1) @lang('label.yes') @else @lang('label.no') @endif</td>
                                       <td>   <ul class="list-inline font-size-20 contact-links mb-0">
                                           
                                               <li class="list-inline-item px-2">
                                                    <a href="#" data-bs-toggle="tooltip" title="@lang('title.edit')" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                 </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" data-bs-toggle="tooltip" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                </li>
                                                            </ul></td>
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
