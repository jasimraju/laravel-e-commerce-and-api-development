<div class="tab-pane fade show active" id="address-edit" role="tabpanel" aria-labelledby="address-edit-tab">
                    <div class="myaccount-content">
                       <h3>{{$title}}</h3> <a href="javascript:void(0)" data-url="{{route('customer.addressmodal')}}"  data-ajaxid="#front-end-ajax" data-modal="#front-modal" onclick="showmodal(this)" ><i class="fa fa-plus"></i></a>
                       @forelse($addresses as $address)
                      <address>
                        <p><strong>{{$address['address']}}</strong></p>
                        <p> #{{$address['unit']}}-{{$address['floor_apartment']}}, {{$address['town_city'] ?? ''}} {{$address['country_name']}} {{$address['post_code']}}
                      </address>
                       <a href="javascript:void(0)" data-url="{{route('customer.addressmodal',$address['id'])}}"  data-ajaxid="#front-end-ajax" data-modal="#front-modal" onclick="showmodal(this)"><i class="icon-note"></i>@lang('title.edit_address')</a><a href="javascript:void(0)" onclick="delete_data(this)" data-url="{{route('customer.address.delete',$address['id'])}}"><i class="fa fa-trash"></i></a>
                       @empty
                       <span>@lang('title.no_address_found')</span>
                  @endforelse
                     
                    </div>
                  </div>