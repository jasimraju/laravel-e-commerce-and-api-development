<style type="text/css">
    table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; // ***********add this
  word-wrap:break-word; // ***********and this
}
td { white-space:pre-wrap; 
    word-wrap:break-word }
</style>
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
                                            <th>@lang('label.order_from')</th>
                                            <th >@lang('label.order_status')</th>
                                            <th>@lang('label.order_tracking_number')</th>
                                            <th>@lang('label.payment_methods')</th>
                                            <th>@lang('label.is_paid')</th>
                                            <th>@lang('label.total') (S$)</th>
                                            <th>@lang('label.number_of_item')</th>
                                             <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>  <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{ substr($order->user->first_name, 0, 2)}}
                                                                </span>
                                                            </div></td>
                                            <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                            <td>{{$order->orderstatus->name ?? ''}}</td>
                                            <td>{{$order->order_sku ?? ''}}</td>
                                            <td>{{$order->paymentMethods->name ?? ''}}</td>
                                            <td>@if($order->is_paid == 0) @lang('label.due') @else @lang('label.paid') @endif</td>
                                            <td>{{$order->orderdetails[0]->total_amount ?? ''}}</td>
                                            <td>{{$order->orderdetails_count ?? ''}}</td>
                                            <td>
                                           <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px-2">
                                                    <a href="javascript:void(0)" onclick="showview(this)"  data-bs-toggle="tooltip" data-bs-html="true" title="@lang('title.view_order_details')" data-url="{{route('admin.order.details.list',$order->id)}}" data-callback="datatable_config" data-viewport="main-sub-view" class="text-success"><i class="fas fa-eye font-size-18"></i></a>
                                                 </li>
                                               <li class="list-inline-item px-2">
                                                    <a href="#" title="@lang('title.edit')" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                 </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" title="@lang('title.delete')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
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
