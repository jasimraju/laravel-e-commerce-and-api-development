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
                                            <th>@lang('label.company') @lang('label.name')</th>
                                            <th>@lang('label.descripiton')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($bandlist as $band)
                                    <tr>
                                    	<td>
                                            @if($band->image->isEmpty())
                                          <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{ substr($band->authority, 0, 2)}}
                                                                </span>
                                                            </div>
                                                            @else
                                                              <div>
                                                                @foreach($band->image as $image)                
                                                                {!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div>
                                                            
                                                            @endif
                                                            
                                                        </td>
                                    	<td>{{$band->name}}</td>
                                    	<td>{{$band->brand_company_name}}</td>
                                    	<td class="table_description">{{$band->brand_description}}</td>
                                    	
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-html="true" title="@lang('title.edit')" onclick="showview(this)"
data-url="{{route('admin.add.band',$band->id)}}" data-viewport="main-sub-view" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
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
