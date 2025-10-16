<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">{{$sub_title}}</h4>
                             <div class="row mt-2 ">
                      <div class="col-lg-4 mb-3 group-add ">
                        <div class="input-group mx-2">
                <input class="form-control rounded-pill py-2 pr-5 mr-1 bg-transparent" type="search"  id="search-inp">
                <span class="input-group-append">
                    <div class="input-group-text border-0 bg-transparent ml-n5"><i class="fa fa-search"></i></div>
                </span>
            </div>
                      </div>
             
                   <div class="col-lg-3 mb-3 group-dropdown ">
                    
            <select type="text" id="group" name="group" class="form-control m-input m-input--solid select2" >
              <option value ="" selected>{{ __('translation::translation.group_single') }}</option>
              @foreach($groups as $key => $value)
               <option value="{{$value}}">{{$value}}</option>
               @endforeach
               
            </select>
                   </div>
                  
                  <div class="col-lg-2 mb-3 group-dropdown ">
                    <select type="text" id="language" name="language" class="form-control m-input m-input--solid select2" >
               <option value ="" selected>{{ __('translation::translation.locale')}}</option>
               @foreach($languages as $key => $value)
               <option value="{{$key}}">{{$value}}</option>
               @endforeach

            </select>
                  </div>
                  
                    <div class="col-lg-3 mb-3 group-add "><a class="btn btn-base text-white " id="add_new_language" >@lang('settings.add_phrase')</a></div>
                  </div>
                                 <div class="">
                                <table id="datatable-buttons" class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                               <tr>
                                <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.group_single') }}</th>
                                <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.key') }}</th>
                                <th class="uppercase font-thin">{{ config('app.locale') }}</th>
                                <th class="uppercase font-thin">{{ $language }}</th>
                            </tr>
                                    </thead>
                                  
                                          <tbody id="tbody">
                  @php $i=0; @endphp 
                  @foreach($translations as $type => $items)
                                
                                @foreach($items as $group => $translations)

                                    @foreach($translations as $key => $value)

                                        @if(!is_array($value[config('app.locale')]))
                                            <tr>
                                                <td id="group-{{$i}}">{{ $group }}</td>
                                                  <td class="table_description" id="key-{{$i}}">{{ $key }}</td>
                                                <td >{{ $value[config('app.locale')] }}</td>
                                                <td class="data-text table_description">
                                                  
                                                  <span class="" id="show-{{$i}}"><i class="fas fa-edit view-tr" id="value-{{$i}}" onclick="showedit(this)"></i>{{ $value[$language] }}</span>
                                                  <span class="d-none" id="datashow-{{$i}}">
                                                  <textarea class="form-control mb-1 data-text" rows='5' id="data-{{$i}}">{{ $value[$language] }}</textarea>
                                                  <button class="btn btn-success text-white float-right">
                                                    <i class="fas fa-plus  p-1 add-tr" data-id="{{$language}}" id="add-{{$i}}" data-url="{{route('admin.group.lang.update',$language)}}" onclick="langfromsubmit(this)"></i>
                                                  </button>
                                                  <button class="btn btn-danger text-white float-right mr-2">
                                                    <i class="fas fa-minus  p-1 minus-tr" onclick="removeEidt(this)" id="minus-{{$i}}"></i>
                                                  </button>
                                                  </span>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endif

                                    @endforeach

                                @endforeach
                                           
                            @endforeach
                  
                  
                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
