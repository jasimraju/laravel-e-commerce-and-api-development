 <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="myaccount-content">
                       <h3>{{$title}}</h3>
                      <div class="myaccount-table table-responsive text-center">
                        <table class="table table-bordered">
                          <thead class="thead-light">
                            <tr>
                              <th>@lang('title.orders')#</th>
                              <th>@lang('label.status')</th>
                              <th>@lang('title.order_items')</th>
                              <th>@lang('title.total')</th>
                              <th>@lang('label.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($orderhistorys as $orderhistory)
                            @php 
                            $status = $orderhistory['status_name']
                            @endphp
                            <tr>
                              <td>{{$orderhistory['order_no']}}</td>
                              <td>@lang($status)</td>
                              <td class="pending">{{$orderhistory['item_text']}}</td>
                              <td>{{$orderhistory['total']}}</td>
                              <td><a href="javascript:void(0)" data-url="{{route('customer.orderdetails',$orderhistory['order_no'])}}" data-viewport="customer_main_body"
onclick="showview(this)" class="check-btn sqr-btn ">View</a></td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>