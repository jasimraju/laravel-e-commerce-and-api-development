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
                                            <th>@lang('label.product') @lang('label.name')</th>
                                            <th >@lang('label.varient') @lang('label.name')</th>
                                          
                                            <th>@lang('label.supplier') @lang('label.name')</th>
                                            <th>@lang('label.price')</th>
                                            <th>@lang('label.qty') (S$)</th>
                                            
                                             <th>@lang('label.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order_details as $orderdetail)
                                        <tr>
                                            <td><div>
                                                                @foreach($orderdetail->varient->image as $image)                
                                                                {!!image_compnent($image,'rounded-circle avatar-xs')!!}                         
                                                              
                                                               @endforeach
                                                            </div></td>
                                            <td>{{$orderdetail->product->product_name}}</td>
                                            <td>{{$orderdetail->varient->varient_name}}</td>
                                            <td>{{$orderdetail->supplier->supplier_name}}</td>
                                        
                                            <td>{{$orderdetail->price}}</td>
                                            <td>{{$orderdetail->qty}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
