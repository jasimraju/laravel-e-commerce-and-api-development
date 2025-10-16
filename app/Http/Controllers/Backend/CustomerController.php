<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band_info;
use App\Models\Oject_Image;
use App\Models\Image;
use App\Models\User;
use App\Models\Country_info;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use App\Models\Order;
use App\Models\Orderdetails;
use Auth;

class CustomerController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.customer');
        $this->main_view_port = 'layouts.backend.admin.inner.customer';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.customer_main';
        $sub_title = __('title.customer_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.customer_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.customer') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_customer') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.customer') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

        public function show(User $customer)
            {
                //
                $customers = $customer::with('country')->withCount('orderlist')->orderBy('id', 'DESC')->get();

               
                $sub_title = __('title.customer_list');
                $main_view_port = $this->main_view_port.'.customer_list';
                return view($main_view_port,compact('sub_title','customers'));
            }

    public function create(Request $request)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],                        
                                              
            ],
            [ 
                'first_name.required' => __('message.please_write_a').' '.__('label.first_name'),
                'last_name.required' => __('message.please_write_a').' '.__('label.last_name'),
                'country_id.required' => __('message.please_select_a').' '.__('label.select_country'),
                 'email.required' => __('message.please_select_a').' '.__('label.email'),
                'password.required' => __('message.please_select_a').' '.__('label.password'),
                
               
            ]
        ); 
               $data = $request->only('first_name','last_name','country_id','phone','email', 'password');
             $data['password'] = Hash::make($data['password']);
            User::createuser($data);
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.add_customer';
     
        $sub_title = __('title.add_customer');
        $courntries = Country_info::get();
       
        return view($main_view_port,compact('sub_title','courntries'));
    }
    }

    function delete_customer(User $customer,$id){
        /*check has order */
        $customers = $customer::withCount('orderlist')->where('id',$id)->first();

        if($customers == 0){
            /*customer delate able */
        }
        else{
            /*delete all card */
            /*delete all address*/
            /*all shoping card*/
            /*user wish list*/
            /*userDevice */
            /*userConnection*/
            /*user serach list*/
            /*delivery infor*/

        }
    }

    function show_customer_order(Order $order,$id){
       
        $orders = $this->show_admin_order($order,'user_id' ,$id);
        $customer = User::find($id);
        $sub_title = __('title.order_list');
        $main_view_port = 'layouts.backend.admin.inner.order.order_list';
        return view($main_view_port,compact('sub_title','orders'));
    }
}
