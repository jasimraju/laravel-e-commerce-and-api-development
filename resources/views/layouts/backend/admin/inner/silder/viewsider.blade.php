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
                                        	<th>@lang('label.title')</th>
                                            <th>@lang('label.tag_line')</th>
                                            <th>@lang('label.descripiton')</th>
                                            <th>@lang('label.slider_for_page')</th>
                                            <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody> 
                                        @foreach( $siderlist as $pagesider)
                                        @if(!$pagesider->slider->isEmpty())
                                        @foreach( $pagesider->slider as $slider)
                                        <tr>

                                            <td> <div>
                                                                @foreach($slider->image as $image)                
                                                                {!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div></td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->tag_line}}</td>
                                            <td>{{$slider->description}}</td>
                                             <td>{{$pagesider->title}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                            @endforeach                              
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
