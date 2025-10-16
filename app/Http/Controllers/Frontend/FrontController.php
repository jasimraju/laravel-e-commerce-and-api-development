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


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
     public $main_title;
    public $main_view_port;
    Public $routename;
    public function __construct()
    {
      
        $this->main_view_port = 'layouts.frontend.page';
        $this->routename = Route::currentRouteName();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {

      /*shoping cart start*/
     $final_cart = $this->shoping_cart();
     /*end shoping cart*/

     /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
      $slider = new Frontpagelist();
      $metadata = $this->slider_meta_title($slider,$this->routename);

     $weeklydeal = new Weekly_deal();
        $varientobject = new Varient_info();
     $weeklydeals = $this->check_weeklydeals($weeklydeal,$varientobject,3);
      usort($weeklydeals, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });

        $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        //$Product_info = new Product_info;
        $products = '';
      
    $view = $this->main_view_port.'.home';
    $banner_view = 'layouts.frontend.inner.banner_slide';
    $category_view = 'layouts.frontend.inner_view.cat_menu_name';
    $uper_footer ='layouts.frontend.inner_view.infor_menu';
    $page_id = 'tabproductcontniur';
        return view($view,compact('metadata','banner_view','category_view','uper_footer','categorylist','products','final_cart','wishlist','weeklydeals','page_id','metadata'));
    }

     public function showcart($id=null)
    {
       /*shoping cart start*/
      $final_cart = $this->shoping_cart();;
     /*end shoping cart*/
     /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
     $slider = new Frontpagelist();
$metadata = $this->slider_meta_title($slider,$this->routename);

        $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){
        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }
    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.shoping_chart');
       $main_page = 'layouts.frontend.shopingcart.shopingcart'; 
        $countries = Country_info::all();

        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','final_cart','countries','wishlist'));
        
    }

     public function showcheckout($id=null)
    {
      /*shoping cart start*/
      $final_cart = $this->shoping_cart();
      $carts = $final_cart->toArray();
     /*end shoping cart*/
     /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
     $slider = new Frontpagelist();
$metadata = $this->slider_meta_title($slider,$this->routename);

        $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){
        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }
    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.checkout');
       $main_page = 'layouts.frontend.shopingcart.checkout';
       $i=0;
       foreach ($carts as $cart) {
          $cart = Varient_info::where('id',$cart['varient_id_value'])->first();
          
          $carts[$i]['sku'] = $cart->product_sku;
          
          $i++;

       }
         
           $paymentmethods = Paymentmethods::all();
            $countries = Country_info::all();
            $delivry_slot = $this->showslot();

     if (Auth::check()){
         
          $address = Address_info::where('rel_id',Auth::user()->id)->where('type',1)->orderBy('id', 'DESC')->get();
          if($address->count() == 0){
            
            $address =0;
          }
          else{

            $address = $address[0];
            
          }
        }
        else{
          $address =0;
         
        }
        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','countries','final_cart','carts','paymentmethods','wishlist','delivry_slot','address'));
        
    }

    public function registration(Request $request){
        if($request->isMethod('post')){
             $request->validate(
            [
                   'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],                              
            ],
            [ 
                'first_name.required' => __('message.please_write_a').' '.__('label.first_name'),
                'last_name.required' => __('message.please_write_a').' '.__('label.last_name'),
                'country_id.required' => __('message.please_select_a').' '.__('label.select_country'),
                'dob.required' => __('message.please_select_a').' '.__('label.date_of_brith'),
                'email.required' => __('message.please_select_a').' '.__('label.email'),
                'password.required' => __('message.please_select_a').' '.__('label.password'),
                
               
            ]
        );
             $data = $request->only('first_name','last_name','country_id','phone','dob', 'email', 'password');
             $data['password'] = Hash::make($data['password']);
            User::createuser($data);
             return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
         }
         /*end post requst*/
         else{
          $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){
        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }
    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.create_account');
       $main_page = 'layouts.frontend.registration.registration'; 
       $countries = Country_info::all();
      $final_cart = $this->shoping_cart(); 
      /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
     $slider = new Frontpagelist();
     $metadata = $this->slider_meta_title($slider,$this->routename);

       
        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','countries','final_cart','wishlist'));
    }
    }

        public function login($mes = null){

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
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.login');
       $main_page = 'layouts.frontend.registration.login';
       $final_cart = $this->shoping_cart(); 
       /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
    
        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','mes','final_cart','wishlist'));
    }

    function addcart(Request $request,$id,$qty = null,$view = null){

      $product_info = new Product_info;
    $unique_id = $this->brokenproductid($id);
    
    $product_id = $unique_id[0];
      $varient_id = $unique_id[1];
      $supplier_id = $unique_id[2];
    
    
      $varient = new Varient_info();
            $product = new Product_info();
      //$varient_list = Varient_info::with('image')->where('id',$varient_id)->first();
      $varient_list  =  $this->unique_vanlist($varient,$varient_id,null,'id',$product);
      
      $product = Product_info::select('band_info_id','unit_id','online_display_name','product_name', 'product_number')->with('brand')->with('unit')->where('id',$product_id)->first();
     
   
     

   $shopingcart  = new Shopingcart();
    $shoping_cart = $this->shopcartid($shopingcart);


    /*check exit in shoping chart*/
    if (Auth::check()) {
    $user_id = Auth::user()->id;
  $cartexit = Shopingcartdetails::where('cache_id',$shoping_cart->cache_id)->where('shoping_cart_id',$shoping_cart->id)->where('user_id',$user_id)->where('varient_id',$id)->first();

  }
  else{
      $cartexit = Shopingcartdetails::where('cache_id',$shoping_cart->cache_id)->where('shoping_cart_id',$shoping_cart->id)->where('varient_id',$id)->first();
  }

 
 

  /*price cal*/ 
  $data['price'] = $varient_list[0]['price']-$varient_list[0]['discount'];
  $data['image'] = removeUrlfirstpart(route('homepage'),'/public/storage',$varient_list[0]['image_url']);
  $data['other'] = NULL;
  $data['title'] = $varient_list[0]['name'];
  $data['discount'] = $varient_list[0]['discount'];
  $data['shoping_cart_id'] = $shoping_cart->id;
  $data['cache_id'] = $shoping_cart->cache_id;
  $data['user_id'] = (Auth::check()) ? Auth::user()->id : NULL;
  $data['varient_id'] = $id;
  $data['varient_id_value'] = $varient_list[0]['varient_id'];
  $data['brand'] = $varient_list[0]['brand_name'];
  $data['unit_details'] = $varient_list[0]['unit_quantity'].' '.$varient_list[0]['unit_name'];
  
  if(empty($qty)){
    
  $data['qty'] = 1;
  }
  else{

    $data['qty'] = $qty;
  }

  if(!empty($cartexit)){
    /*update*/
    if(empty($qty)){
    $requestData['qty'] = $cartexit->qty + $data['qty'];
    Shopingcartdetails::updateShopingcartdetails($requestData,$cartexit->id);
  }
  else{
      if(empty($view)){
        if(empty($qty)){
    $requestData['qty'] = $cartexit->qty +1;
        }
        else{
    $requestData['qty'] =  $qty;
    }
  }
  else{

    $requestData['qty'] =  $qty;
  }
    Shopingcartdetails::updateShopingcartdetails($requestData,$cartexit->id);
  }
  }
  else{
    /*insert*/

    Shopingcartdetails::createShopingcartdetails($data);
  }

    
    /*shoping cart start*/
      
     $final_cart = $this->shoping_cart();
     /*end shoping cart*/
 if(is_null($view)){

       return view('layouts.frontend.inc.minshopcart',compact('final_cart'));
     }
     else{
       $countries = Country_info::all();
       return view('layouts.frontend.shopingcart.shopingcart',compact('final_cart','countries'));
     }
   
    }

     function addwishlist(Request $request,$id,$view = null){

      $unique_id = $this->brokenproductid($id);
    $product_id = $unique_id[0];
      $varient_id = $unique_id[1];
      
      $varient = Varient_info::with('image')->where('id',$varient_id)->first();
      $product = Product_info::select('id','band_info_id','unit_id','online_display_name','product_name', 'product_number')->with('brand')->with('unit')->where('id',$product_id)->first();

      $data['object_id'] = $varient->id;
      $data['object_p_id'] = $product->id.'_'.$varient->id.'_'.$varient->supplier_id;
        $data['object_name'] = $product->online_display_name.' '.$varient->name;
        $data['image'] = $varient->image[0]->folder_location.'/'.$varient->image[0]->name;;
        $data['type'] = 1;

         $wishlist  = new Wishlist();
    $wishlist_cart = $this->wislisttid($wishlist,$data);

     /*shoping cart start*/
      
     $wishlist = $this->shoping_wishlist();
     /*end shoping cart*/
 if(is_null($view)){

       return view('layouts.frontend.inc.minwishlist',compact('wishlist'));
     }
     else{
       $countries = Country_info::all();
       return view('layouts.frontend.shopingcart.shopingcart',compact('wishlist','countries'));
     }
  }

    function showcartmin($view = null){
      /*shoping cart start*/
      
     $final_cart = $this->shoping_cart();

     /*end shoping cart*/


       if(is_null($view)){

       return view('layouts.frontend.inc.minshopcart',compact('final_cart'));
     }
     else{
       $countries = Country_info::all();
       return view('layouts.frontend.shopingcart.shopingcart',compact('final_cart','countries'));
     }
    }

    function removeShopingcart($id=null,$view = null){
      if(empty($id)){
            $final_cart = $this->shoping_cart();
            foreach ($final_cart as $cart) {
              Shopingcartdetails::find($cart->id)->delete();
            }
      }
      else{
        Shopingcartdetails::find($id)->delete();
       
      }
         $final_cart = $this->shoping_cart();
       if(is_null($view)){

       return view('layouts.frontend.inc.minshopcart',compact('final_cart'));
     }
     else{
       $countries = Country_info::all();
       return view('layouts.frontend.shopingcart.shopingcart',compact('final_cart','countries'));
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

    function login_ajax(){
        $main_page = 'layouts.frontend.registration.login_ajax';
      return view( $main_page);
    }



    function create_update_address($data,$type = NULL,$update = NULL){
      if(empty($type)){
        $data_table = [];
        foreach ($data as $key => $value) {
          $key = str_replace("ship_", "", $key);
          $data_table[$key] = $value;
        }
      
      $data_table['tyle'] = 3;
      }
      else{
        $data_table = $data;      
        $data_table['tyle'] = 1;
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
 
    function create_orders($data){
      $neworder = Order::createOrder($data);
      return $neworder->id;

    }
    




      public function forgetpassword($mes = null){
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
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.login');
       $main_page = 'layouts.frontend.registration.forgetpassword';
       $final_cart = $this->shoping_cart(); 
       /*wislist*/
     $wishlist =$this->shoping_wishlist();
     return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','mes','final_cart','wishlist'));
      }

    public function request_restpassword(Request $request){
      /*check email user */

            $request->validate(
            [
                   'email' => ['required', 'email'],
                                                  
            ],
            [ 
                'email.required' => __('message.please_write_a').' '.__('label.email'),
                'email.email' => __('message.please_write_a_correct').' '.__('label.email'),
                              
                
               
            ]
        );

      $user = User::where('email',$request->email)->first();
            /*view page */
             $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){

        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }

    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.login');
       $main_page = 'layouts.frontend.registration.forgetpassword';
       
       $final_cart = $this->shoping_cart(); 
       /*wislist*/
     $wishlist =$this->shoping_wishlist();
     $slider = new Frontpagelist();
     $metadata = $this->slider_meta_title($slider,$this->routename);

      if(!empty($user))
        {

          $data['token'] = generateRandomStr(36);
             /*update reset email table */
             $data['email_opt'] = generateRandomNumber(6);
             $data['end_date_time'] = Carbon::now()->addMinutes(10)->timestamp;
             $data['start_date_time']  = Carbon::now()->timestamp;
             $data['email'] = $user->email;
             $name = $user->first_name.' '.$user->last_name;


      $password = Passwordrest::createPasswordrest($data);
             /*send email*/
             $this->sendforgetpassword($data,$name);
             $mes = __('message.please_check_you_email');

     return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','mes','final_cart','wishlist'));
            
        }
        else{
        $mes = __('message.email_address_does_not_exit');
      return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','mes','final_cart','wishlist'));
        }

   

      

      }

    public function forgetpassword_rest(Request $request,$token){
       if($request->isMethod('post')){
            $request->validate(
            [
                   'email' => ['required', 'email'],
                   'opt' => ['required'],
                   'token' => ['required'],
                   'password' => ['required', 'string', 'min:8', 'confirmed'], 
                                                  
            ],
            [ 
                'email.required' => __('message.please_write_a').' '.__('label.email'),
                'email.email' => __('message.please_write_a_correct').' '.__('label.email'),
     
            ]
        );
            //$q->whereDate('start_date', '<=', $postFr);
//$q->whereDate('end_date', '>=', $postFr);
                $now = Carbon::now()->timestamp;
             $password_resst = Passwordrest::where('token',$request->token)->where('end_date_time','>=',$now)->where('email_opt',$request->opt)->where('email',$request->email)->first();
             if(!empty($password_resst)){
              $user_email = $password_resst->email;
              $user_details = User::where('email',$user_email)->first();
              if(!empty($user_details)){

               $pass['password'] = Hash::make($request->password);
               $user_update = User::updateUser($pass,$user_details->id);
               $res=Passwordrest::where('id', $password_resst->id)->delete();
               $msg = __('message.reset_password_successfull');
               return redirect(route('front.log.login',$msg));
           

              }
              else{
               $msg = __('message.reset_token_does_not_exit');
               return redirect(route('front.log.login',$msg)); 
              }
             }
             else{
              $msg = __('message.reset_token_does_not_exit');
               return redirect(route('front.log.login',$msg));
             }

            
       }
       else{
             $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
        if(empty($id)){
        $products = $this->parent_productlist($Product_info);
    }
    else{
       $products = $this->parent_productlist($Product_info,$id); 
    }

    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.login');
       $main_page = 'layouts.frontend.registration.resetpasswod';
       
       $final_cart = $this->shoping_cart(); 
       /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*check reset token*/
     $slider = new Frontpagelist();
     $metadata = $this->slider_meta_title($slider,$this->routename);
       $now = Carbon::now()->timestamp;
      $password_resst = Passwordrest::where('token',$token)->where('end_date_time','>=',$now)->first();
      if(!empty($password_resst)){
        $email = $password_resst->email;
        $mes = '';
     return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','products','final_cart','wishlist','email','mes','token'));
      }
      else{
       $msg = __('message.reset_token_does_not_exit');
          return redirect(route('front.log.login',$msg));
      }
    }
      
    }

    /*product details page*/
    public function productdetails(Request $request,$varient_id)
    {
       /*shoping cart start*/
      $final_cart = $this->shoping_cart();;
     /*end shoping cart*/
     /*wislist*/
     $wishlist =$this->shoping_wishlist();
     /*endwishlist*/
     $slider = new Frontpagelist();
$metadata = $this->slider_meta_title($slider,$this->routename);
        $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $Product_info = new Product_info;
  
     $varient = new Varient_info();
            $product = new Product_info();
           $productdetails =  $this->unique_vanlist($varient,$varient_id,3,'id',$product);
           $carbon = new Carbon();
if($productdetails['product_details'][0]['end_date'] !=false){
$productdetails['product_details'][0]['end_date'] = $this->difftwotime($carbon,$productdetails['product_details'][0]['end_date']);
}
//$diff = $date->diffForHumans($now);

    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       $title_page = __('title.product_details');
       $main_page = 'layouts.frontend.product.productdetails'; 
        $countries = Country_info::all();
$page_id = 'tabproductdetiils';
        if($request->ajax()){
          $ajax_view = 'layouts.frontend.modal.producdqickview';
         
           return view($ajax_view,compact('final_cart','wishlist','productdetails','page_id'));
        }
        else{
        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','final_cart','countries','wishlist','productdetails','page_id'));
      }
        
    }
 
   function show_flash_product($category_id = null)
   {
    $final_cart = $this->shoping_cart();
     /*end shoping cart*/
     /*wislist*/
     $wishlist =$this->shoping_wishlist();

    $product = new Product_info();
    if(empty($category_id)){
    $products = $this->all_hot_product_web($product);
  }
  else{
    $products = $this->all_hot_product_web($product,$category_id);
  }
    

       $view = 'layouts.frontend.product.product_view';
 $page_id = 'tabproductcontniur';
        return view($view,compact('products','final_cart','wishlist','page_id'));
  }

    
          /* all product */
    public function productalllist(Request $request,$cat_id=null)
    {

       /*shoping cart start*/
      $final_cart = $this->shoping_cart();
     /*end shoping cart*/
     /*wislist*/
     $wishlist =$this->shoping_wishlist();
      $slider = new Frontpagelist();
      
      $metadata = $this->slider_meta_title($slider,$this->routename);
      
     /*endwishlist*/
     $pagnation_number = $this->pagination_setting();
     $start  = 0;
  $totalnumberpage = 0;
   $loadPagnation =0;
   if($request->isMethod('post')){
            $reqdata = $request->all();
       $start  = ($reqdata['load_page']-1)*$this->pagination_setting();
       $pagnation_number  = ($reqdata['load_page'])*$this->pagination_setting();
       $end  = ($reqdata['load_page'])*$this->pagination_setting();
  $totalnumberpage = $reqdata['total_page'];
   $loadPagnation = $reqdata['load_page'];
      }
        $category = new Category_info;
        //$product = new Product_info();
         $varientobject = new Varient_info();
        if(!empty($cat_id)){
          /**/
           $totallist = $this->varientCount($varientobject,$cat_id);
           if(!empty($totallist)){
            $totalnumberpage = ceil($totallist/$pagnation_number);
            
           }
         if($start == 0){
            $loadPagnation = 1;
            $end = $pagnation_number;
           }
          
          $categoryunq = $category::find($cat_id);
          $categorylist = $category::with('image')->where('parent_id',$cat_id)->get();
        
          $products =  $this->showallvarient($varientobject,$start,$end,$cat_id);
          $title_page = __($categoryunq->language_file_name.'.'.$categoryunq->name);
         
        }
        else{
           $totallist = $this->varientCount($varientobject);
           if(!empty($totallist)){
            $totalnumberpage = ceil($totallist/$pagnation_number);
            
           }
           if($start == 0){
            $loadPagnation = 1;
            $end = $pagnation_number;
           }
         
           
        $categorylist = $this->parent_catlist($category);
        
     $products =  $this->showallvarient($varientobject,$start,$end);

     $title_page = __('title.all_product');
    
   }
usort($products, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
  
     
     $weeklydeal = new Weekly_deal();
       
     $weeklydeals = $this->check_weeklydeals($weeklydeal,$varientobject,3);
      usort($weeklydeals, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
    
//$diff = $date->diffForHumans($now);

    $view = $this->main_view_port.'.other_page';
       $banner_view = 'layouts.frontend.inner.other_banner';
       
       $main_page = 'layouts.frontend.product.product'; 
        $countries = Country_info::all();
        $page_id = 'allproduclist';
        if($request->ajax()){
          /*ajax load*/
         $main_page = 'layouts.frontend.product.product_view_ajax'; 
           return view($main_page,compact('final_cart','wishlist','products','page_id','cat_id','totalnumberpage','loadPagnation'));exit;
          
        }
        else{
          /*url load*/
        return view($view,compact('metadata','banner_view','title_page','main_page','categorylist','final_cart','countries','wishlist','products','weeklydeals','page_id','cat_id','totalnumberpage','loadPagnation'));
      }
        
    }

    public function show_filler($cat_id=null){
       $view = 'layouts.frontend.product.inc.fillerviewdetails';
        $category = new Category_info;
        if(!empty($cat_id)){
        $categorylist = $category::with('image')->where('parent_id',$cat_id)->get();
       
        }
        else{
       $categorylist = $this->parent_catlist($category);
     }

        $brandlist = Band_info::all();
        $supplierlist = Supplier_info::all();
        return view($view,compact('categorylist','brandlist','supplierlist'));
    }

        function removeWishcart($id=null,$view = null){
      if(empty($id)){
            $final_cart = $this->shoping_cart();
            foreach ($final_cart as $cart) {
              Shopingcartdetails::find($cart->id)->delete();
            }
      }
      else{
        Shopingcartdetails::find($id)->delete();
       
      }
         $final_cart = $this->shoping_cart();
       if(is_null($view)){

       return view('layouts.frontend.inc.minshopcart',compact('final_cart'));
     }
     else{
       $countries = Country_info::all();
       return view('layouts.frontend.shopingcart.shopingcart',compact('final_cart','countries'));
     }
    }


        public function showslot(){
           $details =  Delivery_weekly::with('weekly_slot')->get();
             $today = date("D M j Y");
             $data_array =[];
             $data_array_all =[];
    $i = 0;
    for ($x = 0; $x <= 6; $x++) {
      
            $data_value = date('D', strtotime($today. ' + '.$x.' days'));
           $data_name =  date('D j M y', strtotime($today. ' + '.$x.' days'));
          $details =  Delivery_weekly::with('weekly_slot')->where('dayName', $data_value)->first();
       $data_array[$x] = $this->time_array($details, $data_name);

        $i++;
    }
 
       return  $data_array;
      
          
        }

        function showajaxaddress(){
          $countries = Country_info::all();

          $address = Address_info::where('rel_id',Auth::user()->id)->where('type',1)->orderBy('id', 'DESC')->get();
          if($address->count() == 0){
            $address =0;
          }
          else{
            $address = $address[0];
          }
           return view('layouts.frontend.shopingcart.address',compact('countries','address'));
          
          
        }


        public function promo_code_check($data,$promo=null)
    {
          
            /*validation*/
         
      
          /*check promo code*/
          $promocode = new Promotion_info();
          if(empty($promo)){
              
                      
  
              /*order post*/
              /*find promo code id*/
              if(!empty($data['promo_code'])){
              $promo_code =  $this->check_promocode($promocode,$data);
              $promo_code_id = $promo_code['promo_code_id'];
             if($promo_code['discount_amount'] != 0 && !empty($promo_code['success'])){
              $discount_p = $this->cal_discount($promo_code['discount_type'],$data['total'],$promo_code['discount_amount']);
              $total = $discount_p['total'];
              $discount_amount = $discount_p['discount_amount'];
              $promo_code = $data['promo_code'];
             }
             else{
                 
                 $total = $data['total'];
                 $discount_amount = 0;
                 $promo_code = $data['promo_code'];
                 
             }
                  
              }
              else{
                $promo_code_id = null; 
                $discount_amount = 0;
                $total = $data['total'];
                $promo_code = null;
              }
              /*order status defult*/
              $order_status =1;
              /*create order data table */
             $order_data['user_id'] = $data['user_id'];
             $order_data['shipaddress_id'] = $data['address_id'];
             $order_data['billingaddress_id'] = $data['address_id'];
             $order_data['orderstatus_id'] =  $order_status;
            
             $order_data['order_from'] = 'web';
             $order_data['order_sku'] = generateRandomNumber(20);
             $order_data['promo_code'] = $promo_code;
             $order_data['promo_code_id'] = $promo_code_id;
             $order_data['discount_p'] = $discount_amount;
             $order_data['total'] = $total;
             $order_data['card_id'] = $data['card_id'];
         
         /*insert order*/
         $order = new Order();
        $create_order = $this->create_order($order,$order_data);
         $order_id =  $create_order->id;
         $orderdetails['payment_id'] = $data['payment_methods_id'];
         $orderdetails['order_id'] = $order_id;
          foreach($data['order_items'] as $items){
              /*check  product*/
              $products = new Product_info();
             $product = $this->unique_product_or_varient($products,$items['varient_id'],$items['product_id']);
             
             $product_count = count($product);
             if($product_count == 1){
                 $price = ($product[0]['price']-$product[0]['discount'])*$items['qty'];
                 $discount = $product[0]['discount']*$items['qty'];
             }
              /*insert order details*/
              $orderdetails['varient_id'] = $items['varient_id'];
              $orderdetails['product_id'] = $items['product_id'];
              $orderdetails['supplier_id'] = $items['supplier_id'];
              $orderdetails['price'] = $price;
              $orderdetails['discount'] = $discount;
              $orderdetails['qty'] = $items['qty'];
              $order_details = new Orderdetails();
              $orderdetails_save = $this->create_orderdetails($order_details,$orderdetails);
            /*stock remove*/
            
            
            
          }
          /*insert delivery order*/
          $delivery_info = new Delivryinfo();
          
          $delivery_data['user_id'] = $data['user_id'];
             $delivery_data['address_id'] = $data['address_id'];
             $delivery_data['order_id'] = $order_id;
             $delivery_data['date_time'] = $data['day_name'].' '.$data['month'].' '.$data['year'];
             $delivery_data['delivery_slot_delivery_week_id'] = $data['day_id'];
             $delivery_data['delivery_status'] = 1;
             $delivery_data['time_slort'] = $data['time_slot_id'];
             
          $delivery_d = $this->create_delivery($delivery_info,$delivery_data);
          /*user notification*/
         $deleted_shopcard = $this->delete_shopcard($data['deviceId'],$data['user_id']);
          return true;

          }
          else{
              /*check promocode*/
     
              
             $checkpromo =  $this->check_promocode($promocode,$data);
              return $checkpromo ;
              
          }
        
            
    }

        function completedorder(Request $request){
if (Auth::check()) {


       $request->validate(
            [
                   'address' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:255'],
            'country_id' => ['required'],
            'apartment' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
            
            'payment_id' => ['required']
                                       
            ],
            [ 
                'address.required' => __('message.please_write_a').' '.__('Address'),
                'post_code.required' => __('message.please_write_a').' '.'Postal code',
                'country_id.required' => __('message.please_select_a').' '.__('label.select_country'),
               'apartment.required' => __('message.please_write_a').' '.'Apartment',
               'payment_id.required' => __('message.please_select_a').' '.__('label.payment_id'),
                
                
               
            ]
        );
       $shiping_address = NULL;
       if($request->is_shping == 1){
             $request->validate(
              [
                   'ship_address' => ['required', 'string', 'max:255'],
            'ship_post_code' => ['required', 'string', 'max:255'],
            'ship_country_id' => ['required'],
            'ship_apartment' => ['required', 'string', 'max:255'],
            'ship_unit' => ['required', 'string', 'max:255'],
            
            'ship_payment_id' => ['required']
                                       
            ],
            [ 
                'ship_address.required' => __('message.please_write_a').' '.__('Address'),
                'ship_post_code.required' => __('message.please_write_a').' '.'Postal code',
                'ship_country_id.required' => __('message.please_select_a').' '.__('label.select_country'),
               'ship_apartment.required' => __('message.please_write_a').' '.'Apartment',
               'ship_payment_id.required' => __('message.please_select_a').' '.__('label.payment_id'),
                
                
               
            ]
            
        );
             $data_shiping = $request->only('ship_first_name','ship_last_name','ship_country_id','ship_phone','ship_email_address', 'ship_post_code', 'ship_unit','ship_town_city','ship_apartment','ship_address','ship_zone');
             /*insert addess shiping*/
             $shiping_address = $this->create_update_address($data_shiping,1);
       /*upadete shiping address*/
       }

       /*insert addess Billing*/
         $data_billing = $request->only('first_name','last_name','country_id','phone','email_address', 'post_code', 'unit','town_city','apartment','address','zone');
       $billing_address = $this->create_update_address($data_billing);
       if(empty($shiping_address)){
        $shiping_address = $billing_address;
          }
       /*upadete billing address*/
       $dayslot = explode('_', $request->dayslot);

       $day_id = $dayslot[0];
       $date_in = explode(' ', $dayslot[1]);
       $day_name = $date_in[0];
       $month = $date_in[1];
       $year = $date_in[1];
       $other_data = $request->only('time_'.$day_id); 
        $time_slot_id = $other_data['time_'.$day_id][0];
       /*create order data*/
       $orderdetails_d  = $this->create_update_ordersdetails();
       
       $order['address_id'] = $shiping_address;
       
       $order['payment_methods_id'] =  $request->payment_id;
       $order['user_id'] = Auth::user()->id;
       
       $order['deviceId'] = sessionSet('session_rendom');
       
       $order['order_items'] = $orderdetails_d['order_items'];
       $order['total'] = $orderdetails_d['total'];
       $order['card_id'] = 1;
       $order['promo_code'] = '';
       $order['day_name'] = $day_name;
       $order['month'] = $month;
       $order['year'] = $year;
       $order['day_id'] = $day_id;
       $order['time_slot_id'] = $time_slot_id;
       $odersubmit = $this->promo_code_check($order);
        
    
       

           return response()->json(['status'=>'success','confirm' => 1, 'refresh'=>'yes', 'data_call_url' => 'urlredirect' ,'element_id' => route('homepage'), 'msg' => __('message.order_taken_successfully')], 200);exit;
     
     
   }
   else{
    /*no login auth*/

   }
    }

    function create_update_ordersdetails(){
  /*insert order*/
    $shopingcartitems = $this->shoping_cart();
    $i=0;
    $total = 0;
    $data_orderdetails = array();
    $orderdetails = array();
    foreach ($shopingcartitems as $item) {
      # code...
      /*insert*/
        $unique_id = $this->brokenproductid($item->varient_id);
    $product_id = $unique_id[0];
      $varient_id = $unique_id[1];
      $supplier_id = $unique_id[2];
      $data_orderdetails[$i]['varient_id'] = $varient_id;
      $data_orderdetails[$i]['product_id'] = $product_id;
      $data_orderdetails[$i]['supplier_id'] = $supplier_id;
          $data_orderdetails[$i]['qty'] = $item->qty;
          $total = $item->price+$total;
      $i++;
    }
    $orderdetails['order_items'] = $data_orderdetails;
    $orderdetails['total'] = $total;
    return $orderdetails;
    }

      public function delete_shopcard($cache_id,$user_id){
        $shopingcart  = new Shopingcart();
        $shopingcart_exit =  $shopingcart::with('shopingdetails')->where('cache_id',$cache_id)->where('user_id',$user_id)->first();
        if(!empty($shopingcart_exit)){
        foreach ($shopingcart_exit->shopingdetails as $cart) {
                $this->delete_object(new Shopingcartdetails,$cart->id);
             
            }
            $this->delete_object($shopingcart,$shopingcart_exit->id);
        }
    }
    

    
        public function removeShopingcartsessiondata(){
      $session_key = sessionSet('session_rendom');
     unset($_SESSION['session_rendom']);
      $presentcart = Shopingcart::where('cache_id',$session_key)->where('user_id',Auth::user()->id)->first();
      Shopingcart::find($presentcart->id)->delete();
     $this->removeFromcache($session_key);
    }


}


      
        
           