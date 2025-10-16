<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$sub_title}}</h4>
                             
                                 <div class="">
                                <table id="datatable-buttons" class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                        <tr>
                                        	<th>@lang('label.title')</th>
                                            <th>@lang('label.route')</th>
                                            <th>@lang('label.model_name')</th>
                                            <th>@lang('label.parent') @lang('label.name')</th>
                                            <th>@lang('label.type')</th>
                                            <th>@lang('label.status')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    @foreach($menuitems as $menu)
                                    <tr>
                                    	<td>@lang($menu->language_file_name.'.'.$menu->title)</td>                                       
                                        <td>{{$menu->route}}</td>                
                                        <td>{{$menu->model_name}}</td>                             
                                         <td></td>              
                                    	<td>@lang($menu->language_file_name.'.'.$menu->menutype->name)</td>                                   	
                                    	<td>@if($menu->status == 1)<span class="badge bg-success">@lang('label.active')</span>@else<span class="badge bg-danger">@lang('label.inactive')</span> @endif</td> 
                                    	<td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="javascript:void(0)" title="@lang('title.edit')" class="text-success" onclick="showview(this)" data-url="{{route('admin.edit.menu',$menu->id)}}" data-callback="iconpicker" data-viewport="main-sub-view"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                 </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                    </tr>	
                                    @if(!empty($menu->childmenu))
                                    @foreach($menu->childmenu as $childmen)
                                     <tr>
                                        <td>@lang($childmen->language_file_name.'.'.$childmen->title)</td>                                       
                                        <td>{{$childmen->route}}</td>                
                                        <td>{{$childmen->model_name}}</td>                             
                                         <td>@lang($menu->language_file_name.'.'.$menu->title)</td>              
                                        <td>@lang($menu->language_file_name.'.'.$menu->menutype->name)</td>                                     
                                        <td>@if($childmen->status == 1)<span class="badge bg-success">@lang('label.active')</span>@else<span class="badge bg-danger">@lang('label.inactive')</span> @endif</td> 
                                        <td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                               <li class="list-inline-item px-2">
                                                    <a href="javascript:void(0)" title="@lang('title.edit')" class="text-success" class="text-success" onclick="showview(this)" data-url="{{route('admin.edit.menu',$childmen->id)}}" data-callback="iconpicker" data-viewport="main-sub-view"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                 </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @endforeach
                                    <tbody>
                                                                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
