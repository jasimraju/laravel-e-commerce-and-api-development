<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department_info;
use App\Models\Division_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Orderdetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.order');
        $this->main_view_port = 'layouts.backend.admin.inner.order';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.order_main';
        $sub_title = __('title.order_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    public function setting_index(){
         $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu_setting();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.order_main';
        $sub_title = __('title.order_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.order_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.order.list') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.return_order_list') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.deptartment') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }
     private function sub_menu_setting(){
        $listofview = array(array('title' =>__('title.order_status_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.setting.order.status.list') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_order_status') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.setting.order.status.add') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

    public function show(Order $order)
    {
        //
        $orders = $order::with('user')->with('paymentMethods')->with('admin')->with('shipaddress')->with('billingaddress')->with('orderstatus')->withCount('orderdetails')->with([
            'orderdetails' => function ($qry) {   
               $qry->select([
            'order_id', app('db')->raw('sum(price*qty) AS total_amount')
        ])
        ->groupBy('order_id');
            }
        ])->get();
   
        $sub_title = __('title.order_list');
        $main_view_port = $this->main_view_port.'.order_list';
        return view($main_view_port,compact('sub_title','orders'));
    }
public function show_order_status(Orderstatus $orderstatus)
    {
        //
        $order_status = $orderstatus::get();
     
      
        $sub_title = __('title.order_status_list');
        $main_view_port = $this->main_view_port.'.order_status_list';
        return view($main_view_port,compact('sub_title','order_status'));
    }

    public function show_order_details(Orderdetails $orderdetails,$id)
    {
        //
        $order_details = $orderdetails::with('product')->with('varient.image')->with('supplier')->where('id',$id)->get();
     
      
        $sub_title = __('title.order_status_list');
        $main_view_port = $this->main_view_port.'.order_details';
        return view($main_view_port,compact('sub_title','order_details'));
    }


    public function create_status(Request $request)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                
                                             
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                
                                
               
            ]
        ); 
        $data=$request->all();
   
        
                $unit_ins =  Orderstatus::createOrderstatus($data);
       
               
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.add_status';
 
        $sub_title = __('title.add_order_status');
       
        return view($main_view_port,compact('sub_title'));
    }
    }

}
