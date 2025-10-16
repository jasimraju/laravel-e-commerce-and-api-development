<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_info;
use App\Models\Product_info;
use App\Models\Varient_info;
use App\Models\Country_info;
use App\Models\Shopingcartdetails;
use App\Models\Shopingcart;
use App\Models\Paymentmethods;
use App\Models\User;
use App\Models\Address_info;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Wishlist;
use App\Models\Passwordrest;
use App\Models\Weekly_deal;
use App\Models\Band_info;
use App\Models\Supplier_info;
use App\Models\Frontpagelist;
use App\Models\Delivery_weekly;
use App\Models\Promotion_info;
use App\Models\Delivryinfo;


use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Cache;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;


class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
     public $main_title;
    public $main_view_port;
    Public $routename;
    Public $menuitems;
    Public $main_view_port_customer;
    public function __construct()
    {
      $this->menuitems = $this->showallmenu(3);
        $this->main_view_port = 'layouts.frontend.page';
        $this->routename = Route::currentRouteName();
        $this->main_view_port_customer = 'layouts.customer';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {

                   $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){
        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }
    $slider = new Frontpagelist();
    $metadata = $this->slider_meta_title($slider,$this->routename);

    $view = $this->main_view_port.'.other_page';
       
       $final_cart = $this->shoping_cart();
       $menuitems =  $this->menuitems;
      
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title =__('menuitems.dashboard');
       $title_page =__('menuitems.dashboard');
       $main_page = $this->main_view_port_customer.'.customer';

       /*change variable*/
       $main_sub = $this->main_view_port_customer.'.dashboardcustomer';

       /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
    $orderlistlast = $this->orderlist(2);
        return view($view,compact('menuitems','metadata','banner_view','title','title_page','main_page','categorylist','products','final_cart','wishlist','main_sub','orderlistlast'));
    }

    
    
    public function shwdashboard(){

    $view = $this->main_view_port_customer.'.dashboardcustomer';
      $title =__('menuitems.dashboard');
      $orderlistlast = $this->orderlist(2);
        return view($view,compact('title','orderlistlast'));
    }


      public function shworderhistory(){

    $view = $this->main_view_port_customer.'.orderlist';
   $title =__('menuitems.order_history');

     $orderhistorys = $this->orderlist();
        return view($view,compact('title','orderhistorys'));
    }


     public function shwaddress(){

    $view = $this->main_view_port_customer.'.addressview';
        $title =__('menuitems.address_book');
        $addresses = $this->get_address(Auth::user()->id);
        return view($view,compact('title','addresses'));
    }


    public function shwwishlist(){

    $view = $this->main_view_port_customer.'.wishlist';
        $title =__('menuitems.my_favorite_products');
        $wishList = Wishlist::where('user_id',Auth::user()->id)->where('type',1)->get();
        $objectlist = $wishList->pluck('object_id')->toArray();
          $varient = new Varient_info();
       $final_cart = $this->shoping_cart();
        $wishlist =$this->shoping_wishlist();

       $products = $this->parent_vanlist($varient,$objectlist,2,'id');
       
       $page_id = 'otherwishlist';
      usort($products, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
        return view($view,compact('title','final_cart','wishlist','page_id','products'));
    }

    public function shwwprofileedit(Request $request){
      if($request->isMethod('post')){
                $request->validate(
            [
                   'first_name' => ['required'],
                   'last_name' => ['required'],
                   'country_id' => ['required'],
                   
                                                  
            ],
            [ 
                'first_name.required' => __('message.please_write_a').' '.__('label.first_name'),
                'last_name.required' => __('message.please_write_a').' '.__('label.last_name'),
     
            ]
        );
                $data = $request->all();


                User::updateUser($data,Auth::user()->id);
                return response()->json(['status'=>'success','confirm' => 1, 'refresh'=>'yes', 'data_call_url' => 'urlredirect' ,'element_id' => route('customer.dashboard'), 'msg' => __('message.update_successfully')], 200);exit;
      }
      else{
    $view = $this->main_view_port_customer.'.profileedit';
        $title =__('menuitems.account_details');
        $countrise = Country_info::get();
        return view($view,compact('title','countrise'));
      }
    }

      public function shwnotification(){
      $title =__('menuitems.notification');
    $view = $this->main_view_port_customer.'.notification';
   
        return view($view,compact('title'));
    }    



    public function shwcarddetails(){
      $title =__('menuitems.dashboard');
    $view = $this->main_view_port_customer.'.cardlists';
   
        return view($view,compact('title'));
    }

    public function shwchangepassword(Request $request){
      if($request->isMethod('post')){
     

         $request->validate(
            [
                   'oldpassword' => ['required'],
                   'newpassword' => ['required'],
                                   
                                                  
            ],
            [ 
                'oldpassword.required' => __('message.please_write_a').' '.__('label.password'),
                'newpassword.required' => __('message.please_write_a').' '.__('label.password'),
     
            ]
        );
 
        
        
    $user = User::find(Auth::user()->id);
     $currentpassword = $user->password;
    
     $newpassword =  Hash::make($request->newpassword);
 
     if(Hash::check($request->oldpassword,$currentpassword)){
     User::updateUser([
                     'password' => $newpassword,
        ],Auth::user()->id);
       return response()->json(['status'=>'success','confirm' => 1, 'refresh'=>'yes', 'data_call_url' => 'urlredirect' ,'element_id' => route('customer.dashboard'), 'msg' => __('message.update_successfully')], 200);exit;
   }
 }
 else{
      $title =__('menuitems.change_password');
    $view = $this->main_view_port_customer.'.changepassword';
   
        return view($view,compact('title'));
      }
    }

    public function addressmodal(Request $request,$id=null){
      if($request->isMethod('post')){
        $request->validate(
            [
                   'address' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:255'],
            'country_id' => ['required'],
            'apartment' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
  
                                       
            ],
            [ 
                'address.required' => __('message.please_write_a').' '.__('Address'),
                'post_code.required' => __('message.please_write_a').' '.'Postal code',
                'country_id.required' => __('message.please_select_a').' '.__('label.select_country'),
               'apartment.required' => __('message.please_write_a').' '.'Apartment',
              
                
                
               
            ]
        );

        $data_billing = $request->only('first_name','last_name','country_id','phone','email_address', 'post_code', 'unit','town_city','apartment','address','zone');
        if(!empty($id)){
          $this->create_update_address($data_billing,null,$id);
        }
        else{
       $this->create_update_address($data_billing);
     }
       return response()->json(['status'=>'success','confirm' => 1, 'refresh'=>'yes', 'data_call_url' => 'urlredirect' ,'element_id' => route('customer.dashboard'), 'msg' => __('message.update_successfully')], 200);exit;

      }
       else{
      $title =__('menuitems.change_password');
    $view = $this->main_view_port_customer.'.modal.addressmodal';
    $countries = Country_info::get();
   if(!empty($id)){
    $address = Address_info::find($id);
    return view($view,compact('title','countries','address'));
   }
        return view($view,compact('title','countries'));
      }
    }


    function addressDeleted($id){
  
        
        $deleted = Address_info::where('id',$id)->delete();
        $check_address = Address_info::find($id);
        
    return response()->json(['status'=>'success','confirm' => 1, 'refresh'=>'yes', 'data_call_url' => 'urlredirect' ,'element_id' => route('customer.dashboard'), 'msg' => __('message.delete_successfully')], 200);exit;
        
        
    }

        function create_update_address($data,$type = NULL,$update = NULL){
      if(empty($type)){
        $data_table = [];
        foreach ($data as $key => $value) {
          $key = str_replace("ship_", "", $key);
          $data_table[$key] = $value;
        }
      
      $data_table['tyle'] = 1;
      }
      else{
        $data_table = $data;      
        $data_table['tyle'] = 2;
      }
         $data_table['rel_id'] = Auth::user()->id;
         $data_table['type'] = 1;
         if(empty($update)){
      $address =  Address_info::createAddress($data_table);
      return $address->id;
    }
    else{
      $address =  Address_info::updateAddress($data_table,$update);
      return $update;
    }
      
    

    }


      protected function shoping_cart(){
      $cardmod = new Shopingcart();
      $final_carts = $this->show_shoping_cart($cardmod);
    if(!empty($final_carts)){
     $final_cart = $final_carts->shopingdetails;
   }
   else{
    $final_cart = [];
   }
   return $final_cart;
 }

    protected function shoping_wishlist(){
      $cardmod = new Wishlist();
      $final_carts = $this->show_wishlist($cardmod);

    if(!empty($final_carts)){
     $final_cart = $final_carts;
   }
   else{
    $final_cart = [];
   }

     return $final_cart;
   
    }

    public function orderlist($last = null)
    {

        $data['user_id'] = Auth::user()->id;
         $order = new Order();
         $orderhistorys = $order::withcount('orderdetails')->with(['delivery' => function($qr){
             $qr->with('deliverystatus')->with('timeslot');
         }])->orderBy('id', 'DESC')->where('user_id',$data['user_id'])->get();
            if(!empty($last)){
             $orderhistorydata = $this->createorderlist($orderhistorys,2);
         }
         else{
             $orderhistorydata = $this->createorderlist($orderhistorys);
         }
         return $orderhistorydata;
        
    }

  function orderdetails($order_no){

              $data['order_no'] = $order_no; 
              $data['user_id'] = Auth::user()->id; 
                $order = new Order();
                $title =__('menuitems.change_password');
         $ordervarientlist = $order::with(['orderdetails' => function($q){
            $q->with(['varient'=> function($qy){ $qy->with('image')->with('product.unit');}]);
         }])->with(['delivery' => function($qr){
             $qr->with('deliverystatus');
         }])->where('user_id',$data['user_id'])->where('order_sku',$data['order_no'])->first();

            $products =  $this->ordervarientlist($ordervarientlist);
            $view = $this->main_view_port_customer.'.orderdetils';

            return view($view ,compact('products','title'));
  }

    function get_address($user_id){
        $myaddress = Address_info::with('country')->where('type',1)->where('rel_id',$user_id)->orderBy('id', 'desc')->get();
        if(!empty($myaddress)){

        $address = $this->convert_json_address($myaddress);

        return $address;
    }
    else{
      $address = false;
        return $address;
    }

    }




}


      
        
           