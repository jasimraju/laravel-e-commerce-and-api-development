 <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-info-tab">
                    <div class="myaccount-content">
                       <h3>{{$title}}</h3>
                      <div class="profile-wishlist">
                               <table class="table table-bordered">
                          <thead class="thead-light">
                            <tr>
                              <th>@lang('label.name')#</th>
                              <th>@lang('label.varient_name')</th>
                              <th>@lang('label.price')</th>
                              <th>@lang('label.discount_parcentage')</th>
                              <th>@lang('label.discount')</th>
                              <th>@lang('label.qty')</th>
                              <th>@lang('label.image')</th>
                              <th>@lang('label.unit')</th>
                             
                              <th>@lang('label.action')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $product)
                        
                            <tr>
                              <td>{{$product['name']}}</td>
                              <td>{{$product['varient_name']}}</td>
                              <td>{{$product['currency_sign']}}{{$product['price']}}</td>
                              <td>{{round($product['discount_parcentage'],4)}}%</td>
                               <td>{{$product['discount']}}</td>
                               <td>{{$product['qty']}}</td>
                               <td><img src="{{$product['image_url']}}" style="width:50px; height: 50px; "></td>
                               <td>{{$product['unit_quantity']}}{{$product['unit_name']}}</td>
                                  <td><a href="javascript:void(0)" data-url="{{$product['order_details_id']}}"  class="check-btn sqr-btn ">View</a></td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                        </div>
                    </div>
                  </div>