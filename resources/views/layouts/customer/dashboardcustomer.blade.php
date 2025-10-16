 <div class="tab-pane fade active show" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                    <div class="myaccount-content">
                      <h3>{{$title}}</h3>
                      @if(!empty($orderlistlast))
                      @php
                      $status = $orderlistlast['status_name'];
                      @endphp
                      <div class="welcome">
                        <p>@lang($status), <strong>{{$orderlistlast['order_no']}}</strong> <strong>{{$orderlistlast['item_text']}}</strong><a href="#" class="logout"> {{$orderlistlast['currency']}}{{$orderlistlast['total']}}</a></p>
                      </div>
                      <p class="mb-0">{{$orderlistlast['delivery_time_slot']}}</p>
                    </div>
                    @else
                    No order found
                    @endif

                  </div>