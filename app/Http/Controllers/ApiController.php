<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use App\Models\UserConnection;
use App\Models\UserDevice;
use App\Models\Category_info;
use App\Models\Product_info;
use App\Models\Varient_info;
use App\Models\Wishlist;
use App\Models\Address_info;
use App\Models\Cardinfo;
use App\Models\Country_info;
use App\Models\Delivery_weekly;
use App\Models\Paymentmethods;
use App\Models\Silder_and_other_banner;
use App\Models\Promotion_info;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Delivryinfo;
use App\Models\Weekly_deal;
use App\Models\Passwordrest;
use App\Models\SocailSetting;
use App\Models\Shopingcartdetails;
use App\Models\Shopingcart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function register(Request $request)
    {
        //Validate data
        $data = $request->only('first_name','last_name','email', 'password','deviceId','imei','platformId','pushRegId');
        $validator = Validator::make($data, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:50',
             'deviceId' => 'required',
            'imei' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $response = $this->login_aferreg($request->email,$request->password,$request->deviceId,$request->imei,$request->platformId,$request->pushRegId);
        //User created, return success response
        return $response ;
    }

    public function login_aferreg($email,$password,$deviceId,$imei,$platformId,$pushRegId)
    {
     
        
       $credentials['email'] = $email;
       $credentials['password'] = $password;
       $divice['deviceId'] = $deviceId;
       $divice['imei'] = $imei;
       $divice['platformId'] = $platformId;
       $divice['pushRegId'] = $pushRegId;
      
        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
        return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }
        if(!empty($token)){
            /*insert divice id of update */
            $user_info  = User::where('email',$credentials['email'])->first();
            
            $checkdevice = UserDevice::where('user_id',$user_info->id)->where('deviceId',$divice['deviceId'])->first();
            $divice['user_id'] = $user_info->id;
            $data_divice['user_id'] = $user_info->id;
            $data_divice['accessToken'] = $token;
            $data_divice['expireTime'] = config('jwt.ttl'); 
        if(empty($checkdevice)){

            $insert = UserDevice::createUserDevice($divice);
            $data_divice['user_device_id'] = $insert->id;
            
        }
        else{
            $update = UserDevice::updateUserDevice($divice,$checkdevice->id);
            $data_divice['user_device_id'] = $checkdevice->id;
           
        }
            $insert_connection = UserConnection::createUserConnection($data_divice);
        }
        
    
        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
            'token' => $token,
        ]);exit;
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $divice = $request->only('deviceId', 'imei','platformId','pushRegId');
        $data = $request->only('email', 'password','deviceId', 'imei','platformId','pushRegId');

        //valid credential
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50',
           'deviceId' => 'required',
            'imei' => 'required',
            
        ], [
        'email.required' => __('message.email_address_required'),
        'deviceId.required' => __('message.divice_id_required'),
        'imei.required' => __('message.divice_imei_required'),
        'email.email' => 'Please type Valid Email Address',
        'password.required' => __('message.please_type_valid_password')
    ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
        return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }
        if(!empty($token)){
            /*insert divice id of update */
            $user_info  = User::where('email',$credentials['email'])->first();
            
            $checkdevice = UserDevice::where('user_id',$user_info->id)->where('deviceId',$divice['deviceId'])->first();
            $divice['user_id'] = $user_info->id;
            $data_divice['user_id'] = $user_info->id;
            $data_divice['accessToken'] = $token;
            $data_divice['expireTime'] = config('jwt.ttl'); 
        if(empty($checkdevice)){

            $insert = UserDevice::createUserDevice($divice);
            $data_divice['user_device_id'] = $insert->id;
            
        }
        else{
            $update = UserDevice::updateUserDevice($divice,$checkdevice->id);
            $data_divice['user_device_id'] = $checkdevice->id;
           
        }
            $insert_connection = UserConnection::createUserConnection($data_divice);
        }
        
    
        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);exit;
    }
 
    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated, do logout        
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function get_user(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);

        $user_info = $this->user_modify($user);
 
        return response()->json(['success' => true,'user' => $user_info]);
    }
    public function user_modify($user){
          $user_array = [];
    
 

        $user_array['id'] = $user->id;
        $user_array['first_name'] = $user->first_name;
        $user_array['last_name'] = $user->last_name;
        $user_array['country_id'] = $user->country_id;
        $user_array['phone'] =$user->phone;
        $user_array['dateofbrith'] =$user->dob;
        
  
    return $user_array;
    }

    public function get_category(Category_info $category){
        $categorylist = $this->parent_catlist($category,2);
        return response()->json(['success' => true,'categories' => $categorylist],Response::HTTP_OK);
    }

    public function get_product(Request $request){
        /*category wise product*/
        
        $this->validate($request, [
            'category_id' => 'required'
        ]);
        $product = new Product_info();
        $productlist = $this->parent_productlist($product,$request->category_id,2);
        return response()->json(['success' => true,'products' => $productlist], Response::HTTP_OK);

    }

  

    public function post_fav_porduct(Request $request){
        //{user_id":"user id", "object_id":"varient id or catgory id","type":"1= product, 2 = catgory "}
       $data = $request->only('user_id', 'object_id','type');
          $validator = Validator::make($data, [
            'user_id' => 'required',
            'object_id' => 'required',
            'type' => 'required',
        ]);
      
           if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        /*check user exit */
        $user = new User();
        $check_user = $this->checkUser($user,$data['user_id']); 
        if(empty($check_user)){
             return response()->json([
                    'success' => false,
                    'message' => 'user not exit in this system',
                ], 400);
        }
        
        if($data['type'] == 1){
            /*Varient_info*/
            if(is_array($data['object_id'])){

            $varient = Varient_info::with('image')->with('product')->whereIn('id',$data['object_id'])->get();
            $verint_type = 2;
                 }
                 else{
                    $varient = Varient_info::with('image')->with('product')->where('id',$data['object_id'])->first();
                    
                    $verint_type = 1;
                 }
            if($varient){
                
                if($verint_type == 1){
                    
                    
            $image = $varient->image[0]->folder_location.'/'.$varient->image[0]->name;
            $data_p['object_p_id'] = $data['object_id'].'_'.$varient->product->id;
            $data_p['image'] = $image;
            $data_p['object_name'] = $varient->product->online_display_name.' '.$varient->varient_name;
            $data_p['type'] = $data['type'];
            $data_p['user_id'] = $data['user_id'];
            $data_p['object_id'] = $data['object_id'];
             
            $wishlist = $this->addWishlist($data_p);
            
            if(empty($wishlist)){
                return response()->json([
                    'success' => false,
                    'message' => 'You allready fav it'],400);exit;
            }
               else{
                return response()->json([
                    'success' => true,
                    'message' => 'fav category add successfully'],200);exit;
            }
            }
            else{
                $i=0;
               
               if($varient->count() != 0){
                  
                foreach ($varient as $varien_value) {
                    # code...
                    $image = $varien_value->image[0]->folder_location.'/'.$varien_value->image[0]->name;
            $ra_data['object_p_id'] = $data['object_id'][$i].'_'.$varien_value->product->id;
            $ra_data['user_id'] = $data['user_id'];
            $ra_data['object_id'] = $data['object_id'][0];
            $ra_data['object_name'] = $varien_value->product->online_display_name.' '.$varien_value->varient_name;
            $ra_data['type'] = $data['type'];
             $ra_data['image'] = $image;
            $wishlist = $this->addWishlist($ra_data);
          
            $i++;
            $ra_data = [];
                }
                  if(empty($wishlist)){
                return response()->json([
                    'success' => false,
                    'message' => 'You allready fav it'],400);exit;
            }
               else{
                return response()->json([
                    'success' => true,
                    'message' => 'fav category add successfully'],200);exit;
            }
               }else{
                     return response()->json([
                    'success' => false,
                    'message' => __('message.list_not_in_our_database'),
                ], 400);
               }
            }
        }
        else{
             return response()->json([
                    'success' => false,
                    'message' => __('message.list_not_in_our_database'),
                ], 400);
        }
        }
        elseif($data['type'] == 2){
            
            /*category*/
              if(is_array($data['object_id'])){
            $category = Category_info::with('image')->whereIn('id',$data['object_id'])->get();
            $category_type=2;
                 }
                 else{
                    $category = Category_info::with('image')->where('id',$data['object_id'])->first();
                    $category_type=1;
                 }
            
            if($category){
                
            
            if($category_type == 1){
                $image = $category->image[0]->folder_location.'/'.$category->image[0]->name;
                      $ra_data['user_id'] = $data['user_id'];
            $ra_data['object_id'] = $data['object_id'];
            $ra_data['type'] = $data['type'];
            $ra_data['object_name'] = __($category->language_file_name.'.'.$category->name);
             $ra_data['image'] = $image;
            $wishlist = $this->addWishlist($ra_data);
           
            if(empty($wishlist)){
                return response()->json([
                    'success' => false,
                    'message' => 'You allready fav it'],400);exit;
            }
               else{
                return response()->json([
                    'success' => true,
                    'message' => 'fav category add successfully'],200);exit;
            }
            }
            else{
                $i=0;
                if($category->count() != 0){
                foreach ($category as $category_value) {
                    # code...
                    $image = $category_value->image[0]->folder_location.'/'.$category_value->image[0]->name;
                      $ra_data['user_id'] = $data['user_id'];
            $ra_data['object_id'] = $data['object_id'][0];
            $ra_data['type'] = $data['type'];
            $ra_data['object_name'] = __($category_value->language_file_name.'.'.$category_value->name);
             $ra_data['image'] = $image;
            $wishlist = $this->addWishlist($ra_data);
           
          
            $i++;
            $ra_data = [];
                }
                  if(empty($wishlist)){
                return response()->json([
                    'success' => false,
                    'message' => 'You allready fav it'],400);exit;
            }
            else{
                return response()->json([
                    'success' => true,
                    'message' => 'fav category add successfully'],200);exit;
            }
                }else{
                     return response()->json([
                    'success' => false,
                    'message' => __('message.list_not_in_our_database'),
                ], 400);
                }
            }
        }
        else{
            return response()->json([
                    'success' => false,
                    'message' => __('message.list_not_in_our_database'),
                ], 400);
        }
            
        }
       
        
          return response()->json([
            'success' => false,
                     'message' => __('message.oops_something_wrong'),
            
        ], 400);
        
       // $wishlist::createWishlist($rData);
    }

    private function addWishlist($data){
        $checkexit = $this->checkWishlist($data['user_id'],$data['object_id'],$data['type']);
if(empty($checkexit)){
        $wishlist = Wishlist::createWishlist($data);
        return $wishlist;
    }
    else{
        return false;
    }
    }

    private function  checkWishlist($user_id,$object_id,$type){
        $checklist = Wishlist::where('user_id',$user_id)->where('object_id',$object_id)->where('type',$type)->first();
        return $checklist;
    }

    public function myWishlist($user_id,$type,$show=null)
    {

      $wishList = Wishlist::where('user_id',$user_id)->where('type',$type)->get();
  
      if(!$wishList->isEmpty()){
          

       $objectlist = $wishList->pluck('object_id')->toArray();
       
       if(!empty($show)){
        return response()->json(['success' => true,'fav_list_id' => $objectlist], 200);
       }
      if($type == 2){
       $category = new Category_info();
      
       $categorylist = $this->parent_catlist($category,2,$objectlist,'id');
       return response()->json(['success' => true,'categories' => $categorylist], 200);
       
   }
   else{
       $varient = new Varient_info();
      
       $varientlist = $this->parent_vanlist($varient,$objectlist,2,'id');
       
      usort($varientlist, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
       return response()->json(['success' => true,'products' => $varientlist], 200);
      
   }
             
      }
      else{
        return response()->json(['success' => false,'fav_items' => "you have no fav_items"], 400);
      }

    }

    function get_address($user_id){
        $myaddress = Address_info::with('country')->where('type',1)->where('rel_id',$user_id)->orderBy('id', 'desc')->get();
        if(!empty($myaddress)){

        $address = $this->convert_json_address($myaddress);

        return response()->json(['success' => true,'address' => $address], 200);
    }
    else{
        return response()->json(['success' => false,'address' => "No address found"], 200);
    }

    }
    function convert_json_address($myaddress){
         $address_array = [];
    $i=0;
    foreach ($myaddress as $myaddres) {
        # code...

        $address_array[$i]['id'] = $myaddres->id;
        $address_array[$i]['address'] = $myaddres->address;
        $address_array[$i]['unit'] = $myaddres->unit;
        $address_array[$i]['post_code'] = $myaddres->post_code;
        $address_array[$i]['town_city'] =$myaddres->town_city;
        $address_array[$i]['floor_apartment'] =$myaddres->apartment;
        $address_array[$i]['country_name'] =$myaddres->country->name;
                $i++;
    }
    return $address_array;
    }

  public function get_country(){
        /*category wise product*/
        $country = Country_info::select('id','name')->get()->toArray();

         return response()->json(['success' => true,'countrise' => $country], 200);
    }

    public function register_address(Request $request,$id=null)
    {
        //Validate data
        $data = $request->only('address','user_id','email', 'post_code','unit','town_city','apartment_floor','country_id');
        $validator = Validator::make($data, [
            'address' => 'required|string',
            'user_id' => 'required|string',
            'post_code' => 'required',
            'unit' => 'required',
             'apartment_floor' => 'required',
            'country_id' => 'required',
        ]);
        
             if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        
          $address['rel_id'] = $data['user_id'];
          $address['type'] = 1;
          $address['address'] = $data['address'];
          $address['unit'] = $data['unit'];
          $address['country_id'] = $data['country_id'];
          $address['post_code'] = $data['post_code'];
          $address['town_city'] = (isset($data['town_city'])) ? $data['town_city'] : null;
          $address['apartment'] = $data['apartment_floor'];
            if(empty($id)){
            $save = Address_info::createAddress($address);
            $msg = "Address save successfully";
            }
            else{
                Address_info::updateAddress($address,$id); 
                $save = 6;
               $msg = "Address update successfully";
            }
          if(!empty($save)){
              return response()->json([
            'success' => true,
            'message' => $msg,
            
        ], Response::HTTP_OK);
          }
          else{
            return response()->json([
            'success' => false,
            'message' => "some thing wrong",
            
        ], 400);
          }
    }

    function addressDeleted(Request $request){
        $data = $request->only('address_id');
         $validator = Validator::make($data, [
            'address_id' => 'required',
            
        ]);
               if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        
        $deleted = Address_info::where('id',$data['address_id'])->delete();
        $check_address = Address_info::find($data['address_id']);
        
        if(empty($check_address)){
               return response()->json([
            'success' => true,
            'message' => "deleted success fully",
            
        ], 200);
        }
        else{
                  return response()->json([
            'success' => false,
            'message' => "some thing wrong",
            
        ], 400);
        }
        
    }
    
     public function register_card(Request $request,$id=null)
    {

        //Validate data
        $data = $request->only('card_number','user_id','card_holder_name', 'expiration_date','cvv');
        $validator = Validator::make($data, [
            'card_number' => 'required',
            'user_id' => 'required|string',
            'card_holder_name' => 'required',
            'expiration_date' => 'required',
             'cvv' => 'required'
        ]);
        
             if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $card_number = explode('-',$data['card_number']);
        
          $address['card_number'] = $data['card_number'];
          $address['card_holder_name'] = $data['card_holder_name'];
          $address['expiration_date'] = $data['expiration_date'];
          $address['cvv'] = $data['cvv'];
          $address['user_id'] = $data['user_id'];
         
            if(empty($id)){
            $save = Cardinfo::createCardinfo($address);
            $msg = "Address save successfully";
            }
            else{
                Cardinfo::updateCardinfo($address,$id); 
                $save = 6;
               $msg = "Address update successfully";
            }
          if(!empty($save)){
              return response()->json([
            'success' => true,
            'message' => $msg,
            
        ], Response::HTTP_OK);
          }
          else{
            return response()->json([
            'success' => false,
            'message' => "some thing wrong",
            
        ], 400);
          }
    }
    
        function cardDeleted(Request $request){

        $data = $request->only('card_id');
       
         $validator = Validator::make($data, [
            'card_id' => 'required',
            
        ]);
               if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        
        $deleted = Cardinfo::where('id',$data['card_id'])->delete();
        $check_address = Cardinfo::find($data['card_id']);
        
        if(empty($check_address)){
               return response()->json([
            'success' => true,
            'message' => "deleted success fully",
            
        ], 200);
        }
        else{
                  return response()->json([
            'success' => false,
            'message' => "some thing wrong",
            
        ], 400);
        }
        
    }
    
        function get_card($user_id){
        $mycards = Cardinfo::where('user_id',$user_id)->orderBy('id', 'desc')->get();
        if(!empty($mycards)){

        $cards = $this->convert_json_card($mycards);

        return response()->json(['success' => true,'card' => $cards], 200);
    }
    else{
        return response()->json(['success' => false,'card' => "No card found"], 200);
    }

    }
    function convert_json_card($myacards){
         $card_array = [];
    $i=0;
    foreach ($myacards as $mycard) {
        # code...

        $card_array[$i]['id'] = $mycard->id;
        $card_array[$i]['card_number'] = $mycard->card_number;
        $card_array[$i]['card_holder_name'] = $mycard->card_holder_name;
        $card_array[$i]['expiration_date'] = $mycard->expiration_date;
        $card_array[$i]['cvv'] =$mycard->cvv;
   
                $i++;
    }
    return $card_array;
    }

    /*get sider*/
  public function get_sider_data($type){
        /*category wise product*/
        $object = new Silder_and_other_banner();
        $siders = $this->get_silder($object,$type,2);

         return response()->json(['success' => true,'details' =>  $siders], 200);
    }

    public function get_delivery_slot(){
      /*  $timestamp = time()-86400;

$date = strtotime("+1 day", $timestamp);
echo date('DdMy', $date);exit;*/
/*current date*/
    $date_array = [];

    $today = date("D M j Y");
    $i = 0;
    for ($x = 0; $x <= 6; $x++) {
        if($x == 0 || $x == 1){
            
             echo $today;
        }
       else{
        echo $today;
       }

        $i++;
    }
   

    }
public function all_product(){
    $product = new Product_info();
     $productlist =  $this->parent_productlist($product,null,2);
     usort($productlist, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
     return response()->json(['success' => true,'productlist' =>  $productlist ], 200);
}


    public function all_hot_product(){
    $product = new Product_info();
     $productlist =  $this->parent_productlist($product,null,2);
     $newproductlist =[];
     $i=0;
     
     foreach($productlist as $product){
         if($product['discount_parcentage'] != 0  && $product['discount_parcentage'] != 0 ){
         $newproductlist[$i]['brand_name'] = $product['brand_name'];
            $newproductlist[$i]['brand_id'] = $product['brand_id'];
            $newproductlist[$i]['name'] = $product['name'];
            $newproductlist[$i]['price'] =  $product['price'];
            $newproductlist[$i]['currency_sign'] =  $product['currency_sign'];
            $newproductlist[$i]['product_id'] = $product['product_id'];;
            $newproductlist[$i]['supplier_name'] = $product['supplier_name'];
            $newproductlist[$i]['supplier_id'] = $product['supplier_id'];
            $newproductlist[$i]['unit_name'] = $product['unit_name'];
            $newproductlist[$i]['unit_quantity'] = $product['unit_quantity'];
            $newproductlist[$i]['varient_id'] = $product['varient_id'];
            $newproductlist[$i]['discount_parcentage'] = $product['discount_parcentage'];
            $newproductlist[$i]['discount'] = $product['discount'];
            $newproductlist[$i]['image_url'] = $product['image_url'];
            $i++;
         }
     }
      if (!empty($newproductlist)) {
     usort($newproductlist, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
     
       $tag_line = "Up to ".$newproductlist[0]['discount_parcentage']."% discount"; 
     return response()->json(['success' => true,'tag_line' => $tag_line,'productlist' => $newproductlist ], 200);
      }
      else{
          return response()->json(['success' => false,'message' => 'no hot product found' ], 200);
      }
        }
        
        public function product_details($varient_id){
             $varient = new Varient_info();
            $product = new Product_info();
           $details =  $this->unique_vanlist($varient,$varient_id,3,'id',$product);
                      $carbon = new Carbon();
                      
                     
if($details['product_details'][0]['end_date'] !=false){
$details['product_details'][0]['end_date'] = $this->difftwotime($carbon,$details['product_details'][0]['end_date']);
}
        
           return response()->json(['success' => true,'details' => $details ], 200);
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
 
        
         return  response()->json(['success' => true,'delivery_slot' => $data_array ], 200);
          
        }
        
        function time_array($details,$name){
            $day_array = array('dayname' => $name,'id'=>$details->id,"time_slot" => []);
            $i =0;
            foreach($details->weekly_slot as $timeslot){
                
                 $day_array['time_slot'][$i]['title'] =  $timeslot->start_time.'~'.$timeslot->end_time;
                 $day_array['time_slot'][$i]['id'] =  $timeslot->id;
                 $i++;
            }
            return $day_array;
        }
        
        function showpayment_methods(Paymentmethods $paymentmethods){
            $payment_methods = $paymentmethods::get();
            $paymentdata = $this->showpayment_json($payment_methods);
           
            return  response()->json(['success' => true,'payment_methods' => $paymentdata ], 200);
        }
        
        function showpayment_json($payment_methods){
            $payment_m_array = [];
            $i =0;
            foreach($payment_methods as $payment_method){
                $payment_m_array[$i]['id'] = $payment_method->id;
                $payment_m_array[$i]['name'] = __($payment_method->language_file_name.'.'.$payment_method->name);
                $payment_m_array[$i]['logo_image'] =asset('public/storage/image/'.$payment_method->image);
                $i++;
            }
            return $payment_m_array;
            
            
            
        }
   public function refresh(Request $request) {
          $this->validate($request, [
            'token' => 'required'
        ]);
         $token = JWTAuth::refresh($request->token);
         
        
        return $this->createNewToken($token);
    }
   
    protected function createNewToken($token){
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL(),
            'user' => $this->user_modify(JWTAuth::user())
        ]);
    }
    
    public function promo_code_check(Request $request)
    {
          
            /*validation*/
         
              $data=$request->all();
          /*route name*/
          $route_name = $request->route()->getName();
          /*check promo code*/
          $promocode = new Promotion_info();
          if($route_name == 'orderapi'){
              
                      $data_val = $request->only('order_items','user_id','day_name','month', 'day_id','address_id','payment_methods_id','total','deviceId');
        $validator = Validator::make($data_val, [
            'order_items' => 'required|array',
            'user_id' => 'required',
            'day_name' => 'required',
            'month' => 'required',
             'day_id' => 'required',
             'address_id' => 'required',
             'payment_methods_id' => 'required|exists:paymentmethods,id',
             'total' => 'required',
             'deviceId' => 'required',
              ]);
                      if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
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
            
             $order_data['order_from'] = 'Api';
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
          return response()->json(['success' => true,'order' => $create_order->order_sku ], 200);

          }
          else{
              /*check promocode*/
                               $data_val = $request->only('order_items','user_id','day_name','month', 'day_id','address_id','total','promo_code');
        $validator = Validator::make($data_val, [
            'order_items' => 'required|array',
            'user_id' => 'required',
            'day_name' => 'required',
            'month' => 'required',
             'day_id' => 'required',
             'address_id' => 'required',
             'promo_code' => 'required',
             'total' => 'required',
              ]);
                      if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
              
             $checkpromo =  $this->check_promocode($promocode,$data);
              return response()->json($checkpromo);
              
          }
        exit;
            
    }
    
    public function orderlist(Request $request)
    {
        $data = $request->only('user_id');
         $order = new Order();
         $orderhistorys = $order::withcount('orderdetails')->with(['delivery' => function($qr){
             $qr->with('deliverystatus')->with('timeslot');
         }])->orderBy('id', 'DESC')->where('user_id',$data['user_id'])->get();
         $route_name = $request->route()->getName();
         if($route_name == 'orderhistorylast'){
             $orderhistorydata = $this->createorderlist($orderhistorys,2);
         }
         else{
             $orderhistorydata = $this->createorderlist($orderhistorys);
         }
         return response()->json(['success' => true,'orderhistory' => $orderhistorydata ], 200);
        
    }
    
    public function createorderlist($orderhistorys,$last = null){
        
        $order_history = [];
        $i=0;
        if(!empty($last)){
        foreach($orderhistorys as $orderhistory){
           
            $order_history['status_name'] =__($orderhistory->delivery->deliverystatus->language_file_name.'.'.$orderhistory->delivery->deliverystatus->name);
            $order_history['order_no'] = $orderhistory->order_sku;
            $order_history['item_text'] = "Total ".$orderhistory->orderdetails_count." items";
            $order_history['total'] = $orderhistory->total;
            $order_history['currency'] = 'S$';
            $order_history['delivery_time_slot'] =$orderhistory->delivery->timeslot->start_time.' ~ '.$orderhistory->delivery->timeslot->end_time;
         
        }
        }
        else{
               foreach($orderhistorys as $orderhistory){
           
            $order_history[$i]['status_name'] =__($orderhistory->delivery->deliverystatus->language_file_name.'.'.$orderhistory->delivery->deliverystatus->name);
            $order_history[$i]['order_no'] = $orderhistory->order_sku;
            $order_history[$i]['item_text'] = "Total ".$orderhistory->orderdetails_count." items";
            $order_history[$i]['total'] = $orderhistory->total;
            $order_history[$i]['currency'] = 'S$';
            $order_history[$i]['delivery_time_slot'] =$orderhistory->delivery->timeslot->start_time.' ~ '.$orderhistory->delivery->timeslot->end_time;
            $i++;
         
        }
            
        }
       
        return $order_history;
        
    }
    public function change_password(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
   'oldpassword' => 'required',
          'newpassword' => 'required',
        ]);
 
        $user = JWTAuth::authenticate($request->token);
        
    
     $currentpassword = $user->password;
    
     $newpassword =  Hash::make($request->newpassword);
 
     if(Hash::check($request->oldpassword,$currentpassword)){
     User::updateUser([
                     'password' => $newpassword,
        ],$user->id);
        return response()->json(['success' => true,'message' => 'Password update successfull'],200);
     }
     else{
        return response()->json(['success' => false,'message' => 'Old password not match'],200); 
     }
 
        
    }
public function update_profile(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
          
        ]);
         $data = $request->only('first_name','last_name','email','phone','dob','country_id');
        $user = JWTAuth::authenticate($request->token);
        
    
    
   
     User::updateUser($data,$user->id);
        return response()->json(['success' => true,'message' => 'Update successfull'],200);
    
 
        
    }

    function weelky_deals(){
        $weeklydeal = new Weekly_deal();
        $varientobject = new Varient_info();
       $varient_array = $this->check_weeklydeals($weeklydeal,$varientobject);
       usort($varient_array, function($a, $b){
            return $a['discount_parcentage'] < $b['discount_parcentage'];
       });
        return response()->json(['success' => true,'products' => $varient_array],200);
       
    }

    function applyforforgetpassword(Request $request){
        $this->validate($request, [
                   'email' => ['required', 'email'],                                 
            ],
            [ 
                'email.required' => __('message.please_write_a').' '.__('label.email'),
                'email.email' => __('message.please_write_a_correct').' '.__('label.email'),

            ]);
         $user = User::where('email',$request->email)->first();
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

    return response()->json(['success' => true,'message' => $mes],200);
            
        }
        else{
        $mes = __('message.email_address_does_not_exit');
        return response()->json(['success' => fales,'message' => $mes],200);
      
        }

    }

    function changeyoupassword(Request $request){
                   
         $this->validate($request,    [
                   'email' => ['required', 'email'],
                   'opt' => ['required'],
                   'password' => ['required', 'string', 'min:8', 'confirmed'], 
                                                  
            ],
            [ 
                'email.required' => __('message.please_write_a').' '.__('label.email'),
                'email.email' => __('message.please_write_a_correct').' '.__('label.email'),
     
            ]);
 
     

        $now = Carbon::now()->timestamp;
             $password_resst = Passwordrest::where('end_date_time','>=',$now)->where('email_opt',$request->opt)->where('email',$request->email)->first();
             if(!empty($password_resst)){
              $user_email = $password_resst->email;
              $user_details = User::where('email',$user_email)->first();
              if(!empty($user_details)){

               $pass['password'] = Hash::make($request->password);
               $user_update = User::updateUser($pass,$user_details->id);
               $res=Passwordrest::where('id', $password_resst->id)->delete();
               $msg = __('message.reset_password_successfull');
               return response()->json(['success' => true,'message' => $msg],200);
           }
           else{
            $mes = __('message.reset_token_does_not_exit');
        return response()->json(['success' => false,'message' => $mes],200);
           }
       }
       else{
         $mes = __('message.reset_token_does_not_exit');
        return response()->json(['success' => false,'message' => $mes],200);
       }

    }

    function socailappsetting(){
        $socailappdatas = SocailSetting::whereIn('type',[1,2])->get();
        $socailappcad = [];
        $i=0;
        foreach ($socailappdatas as $socailappdata) {
            # code...
            $socailappcad[$i]['app_id'] = $socailappdata->app_id;
            $socailappcad[$i]['app_secret'] = $socailappdata->app_secret;
            $socailappcad[$i]['paltfromname'] = $socailappdata->paltfromname;
            $socailappcad[$i]['call_back_url'] = $socailappdata->cal_back_url;
            if(!empty($socailappdata->other)){
                $socailappcad[$i]['other_option'] = $socailappdata->other;
            }
            $i++;
        }
         return response()->json(['success' => true,'data' => $socailappcad],200);

    }


    public function authenticatefacebook(Request $request)
    {
        $credentials = $request->only('email');
        $divice = $request->only('deviceId', 'imei','platformId','pushRegId');
        $data = $request->only('first_name','last_name','email','deviceId', 'socialplatformid','socialplatformname','imei','platformId','pushRegId');

        //valid credential
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
              'deviceId' => 'required',
              'socialplatformid' => 'required',
              'socialplatformname' => 'required',
               'imei' => 'required',

            
        ], [
        'email.required' => __('message.email_address_required'),
        'deviceId.required' => __('message.divice_id_required'),
        'imei.required' => __('message.divice_imei_required'),
        'email.email' => 'Please type Valid Email Address'
            ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $forsociallogin = $this->loginorregtration($data);
   
        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($forsociallogin)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
       
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }
        if(!empty($token)){
            /*insert divice id of update */
            $user_info  = User::where('email',$credentials['email'])->first();
            
            $checkdevice = UserDevice::where('user_id',$user_info->id)->where('deviceId',$divice['deviceId'])->first();
            $divice['user_id'] = $user_info->id;
            $data_divice['user_id'] = $user_info->id;
            $data_divice['accessToken'] = $token;
            $data_divice['expireTime'] = config('jwt.ttl'); 
        if(empty($checkdevice)){

            $insert = UserDevice::createUserDevice($divice);
            $data_divice['user_device_id'] = $insert->id;
            
        }
        else{
            $update = UserDevice::updateUserDevice($divice,$checkdevice->id);
            $data_divice['user_device_id'] = $checkdevice->id;
           
        }
            $insert_connection = UserConnection::createUserConnection($data_divice);
        }
        
    
        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);exit;
    }


    function loginorregtration($data){
       
    $isUser =[];
    $rearray=[];
          if($data['socialplatformname'] == 'facebook'){
            $isUser = User::where('fd_id', $data['socialplatformid'])->first();

            
              if($isUser){
                    $rearray['email'] = $data['email'];
                    $rearray['password'] = '12345678';
                return $rearray;                
            }else{
                $isemailUser = User::where('email', $data['email'])->first();
                   if($isemailUser){
                    /*update*/
                    $upadateva['fd_id'] = $data['socialplatformid'];
                    $update =User::updateUser($upadateva,$isemailUser->id);
                   
                }
                else{
                $createUser = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'country_id' => 6,
                    'fd_id' =>  $data['socialplatformid'],
                     'password' =>Hash::make('12345678')
                ]);
            }
    
        $rearray['email'] = $data['email'];
        $rearray['password'] = '12345678';
                return $rearray;
                
            }
            /*end user update*/
          }
              
          if ($data['socialplatformname'] == 'google') {
              # code...

            $isUser = User::where('gmail_id', $data['socialplatformid'])->first();
              if($isUser){
                    $rearray['email'] = $data['email'];
                    $rearray['password'] = '12345678';
                return $rearray;                
            }else{
                 $isemailUser = User::where('email', $data['email'])->first();
                if($isemailUser){
                    /*update*/
                    $upadateva['gmail_id'] = $data['socialplatformid'];
                    $update =User::updateUser($upadateva,$isemailUser->id);
                   
                }
                else{
                $createUser = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'country_id' => 6,
                    'gmail_id' =>  $data['socialplatformid'],
                     'password' =>Hash::make('12345678')
                ]);
            }
    
        $rearray['email'] = $data['email'];
        $rearray['password'] = '12345678';
                return $rearray;
                
            }
        }
            /*end user update*/
          
     
         
    
      
    }
    
    public function orderdetails(Request $request)
        {
           
              $data = $request->only('order_no','user_id');
             // $data['order_no'] = $order_no; 
             // $data['user_id'] = $user_id; 
                $order = new Order();
         $ordervarientlist = $order::with(['orderdetails' => function($q){
            $q->with(['varient'=> function($qy){ $qy->with('image')->with('product.unit');}]);
         }])->with(['delivery' => function($qr){
             $qr->with('deliverystatus');
         }])->where('user_id',$data['user_id'])->where('order_sku',$data['order_no'])->first();

            $varient_list =  $this->ordervarientlist($ordervarientlist);
           
            return response()->json(['success' => true, 'orderdetails' => $varient_list ],200);
        }

        private function ordervarientlist($varientlist)
        {
            $i = 0;
            $product_array = array();
            foreach($varientlist->orderdetails as $orderdetail ){

               $calprice =  $this->orderpricecal($orderdetail->price,$orderdetail->qty,$orderdetail->discount);
            $product_array[$i]['name'] = $orderdetail->varient->product->product_name.' '.$orderdetail->varient->varient_name;
            $product_array[$i]['varient_name'] = $orderdetail->varient->varient_name;
            $product_array[$i]['price'] = round($calprice['price'],4);
            $product_array[$i]['discount_parcentage'] = round($calprice['discount'],4);
            $product_array[$i]['discount'] = $calprice['discount_amount'];
            $product_array[$i]['qty'] = $orderdetail->qty;
            $product_array[$i]['is_delete_able'] = $this->checkorderdeletable($varientlist->id,$orderdetail->id);
            $product_array[$i]['currency_sign'] = 'S$';
            $product_array[$i]['unit_name'] = $orderdetail->varient->product->unit->unit_name;
            $product_array[$i]['unit_quantity'] =$orderdetail->varient->unit_of_quantity;
            $product_array[$i]['order_details_id'] = $orderdetail->id; 
            $product_array[$i]['image_url'] = asset('public/storage'.$orderdetail->varient->image[0]->folder_location.'/'.$orderdetail->varient->image[0]->name); 
            $calprice = array();  
            $i++;
            }

            return $product_array;
        }

        private function orderpricecal($price,$qty,$discount){
            $cal = array();
            
            if($discount == 0.0000){

                $cal['price'] = $price;
                $cal['discount_amount'] = 0;
                $cal['discount'] = 0;
            }
            else{

                $discount_parcentage = ($discount*100)/($price+$discount);
                $price = ($price+$discount);
                $cal['discount_amount'] = round($discount/$qty,4);
                $cal['price'] =  $price;
                $cal['discount'] = $discount_parcentage;
            }
            return $cal;

        }

        private function checkorderdeletable($order,$id){
            return true;
        }
        
        function addcart(Request $request){

       $data = $request->only('product_id','varient_id','supplier_id','deviceId','qty','user_id');

         $validator = Validator::make($data, [
            'product_id' => 'required',
            'varient_id' => 'required',
            'supplier_id' => 'required',
              'deviceId' => 'required',
              'qty' => 'required',
              'user_id' => 'required',
                ]);

         if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
    
    $product_id = $data['product_id'];
      $varient_id = $data['varient_id'];
      $supplier_id = $data['supplier_id'];
      $id = $data['product_id'].'_'.$data['varient_id'].'_'.$data['supplier_id'];
      $varient = new Varient_info();
            $product = new Product_info();
     
      $varient_list  =  $this->unique_vanlist($varient,$varient_id,null,'id',$product);
        $shopingcart  = new Shopingcart();
        $shopingcart_data['cache_id'] = $data['deviceId'];
        $shopingcart_data['user_id'] = $data['user_id'];
        $shopingcart_exit =  $shopingcart::where('cache_id',$data['deviceId'])->where('user_id',$data['user_id'])->first();
        if(empty($shopingcart_exit)){
        $shoping_cart = $shopingcart::createShopingcart($shopingcart_data);
        }
        else{
        $shoping_cart =  $shopingcart_exit;
        }
    /*check exit in shoping chart*/
   
  $cartexit = Shopingcartdetails::where('cache_id',$data['deviceId'])->where('shoping_cart_id',$shoping_cart->id)->where('user_id',$data['user_id'])->where('varient_id',$id)->first();
      /*price cal*/ 
        $data_set['price'] = $varient_list[0]['price']-$varient_list[0]['discount'];
        $data_set['image'] = removeUrlfirstpart(route('homepage'),'/public/storage',$varient_list[0]['image_url']);
        $data_set['other'] = NULL;
        $data_set['title'] = $varient_list[0]['name'];
        $data_set['discount'] = $varient_list[0]['discount'];
        $data_set['shoping_cart_id'] = $shoping_cart->id;
        $data_set['cache_id'] = $shoping_cart->cache_id;
        $data_set['user_id'] = $data['user_id'];
        $data_set['varient_id'] = $id;
        $data_set['varient_id_value'] = $varient_list[0]['varient_id'];
        $data_set['brand'] = $varient_list[0]['brand_name'];
        $data_set['unit_details'] = $varient_list[0]['unit_quantity'].' '.$varient_list[0]['unit_name'];
    if(!empty($data['qty'])){
        if(!empty($cartexit)){
         /*update*/
        $requestData['qty'] = $data['qty'];
        Shopingcartdetails::updateShopingcartdetails($requestData,$cartexit->id);
        return response()->json([
            'success' => true,
            'message' => __('message.add_successfully'),
            ],200);exit;
         }
    else{
        $data_set['qty'] = $data['qty'];
        Shopingcartdetails::createShopingcartdetails($data_set);
       return response()->json([
            'success' => true,
            'message' => __('message.update_successfully'),
        ],200);exit;
        }
    }/*end if*/
        else{
         return response()->json([
            'success' => false,
            'message' => __('message.some_thing_wrong'),
        ],400);exit;
        }
     exit;
    }

    public function getcardinfo(Request $request){
        $data = $request->only('deviceId','user_id');
        $validator = Validator::make($data, [
              'deviceId' => 'required',
              'user_id' => 'required',
                ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $shopcart_list = Shopingcartdetails::where('cache_id',$data['deviceId'])->where('user_id',$data['user_id'])->get();

             $i = 0;
            $product_array = array();
            if(!$shopcart_list->isEmpty()){
            foreach($shopcart_list as $shopcart ){
                $unique_id = $this->brokenproductid($shopcart->varient_id);
                    $product_id = $unique_id[0];
                    $varient_id = $unique_id[1];
                    $supplier_id = $unique_id[2];
               $calprice =  $this->orderpricecal($shopcart->price,$shopcart->qty,$shopcart->discount);
            $product_array[$i]['name'] = $shopcart->title;
              $product_array[$i]['price'] = round($calprice['price'],4);
            $product_array[$i]['discount_parcentage'] = round($calprice['discount'],2);
            $product_array[$i]['discount'] = $calprice['discount_amount'];
            $product_array[$i]['qty'] = $shopcart->qty;
            $product_array[$i]['varient_id'] = $unique_id[1];
            $product_array[$i]['product_id'] = $unique_id[0];
            $product_array[$i]['supplier_id'] = $unique_id[2];
            $product_array[$i]['qty'] = $shopcart->qty;
            $product_array[$i]['currency_sign'] = 'S$';
            $product_array[$i]['unit_details'] = $shopcart->unit_details;
            $product_array[$i]['shoping_details_id'] = $shopcart->id; 
            $product_array[$i]['image_url'] = asset('public/storage'.$shopcart->image); 
            $calprice = array();  
            $i++;
            }
            
            return response()->json(['success' => true, 'card_items' => $product_array ],200);
            }
            else{
               return response()->json(['success' => false, 'message' =>__('message.no_items_on_your_shoping_card')],400);  
            }
    }
    
        function removeShopingcart(Request $request,$id=null){
           $data = $request->only('deviceId','user_id');
        $validator = Validator::make($data, [
              'deviceId' => 'required',
              'user_id' => 'required',
                ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        

         $shopingcart  = new Shopingcart();
        $shopingcart_exit =  $shopingcart::with('shopingdetails')->where('cache_id',$data['deviceId'])->where('user_id',$data['user_id'])->first();
        if(!empty($shopingcart_exit)){
      if(empty($id)){
            
            foreach ($shopingcart_exit->shopingdetails as $cart) {
                $this->delete_object(new Shopingcartdetails,$cart->id);
             
            }
            $this->delete_object($shopingcart,$shopingcart_exit->id);

      }
      else{
        
       $this->delete_object(new Shopingcartdetails,$id);
      }
      return response()->json(['success' => true, 'message' =>__('message.delect_successfully')],200);
  }
  else{
    return response()->json(['success' => false, 'message' =>__('message.no_items_on_your_shoping_card')],400);
  }
  
    }
    
       public function return_order(Request $request,$id=null){
            $data = $request->only('order_no','user_id');
        $validator = Validator::make($data, [
              'order_no' => 'required',
              'user_id' => 'required',
                ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $orderobject = new Order();
        $orderitemsobject = new Orderdetails();
        $orderdata = $orderobject::where('order_sku',$data['order_no'])->with('orderdetails')->first();
        if(empty($id)){
            /*delete full order*/
            $check_result = $thie->orderdeleteable($orderobject,$orderitemsobject,$orderid);
            if($check_result){
                $orderdata = $orderobject::where('order_sku',$data['order_no'])->with('orderdetails')->first();
                foreach ($orderdata->orderdetails as $orderitem) {
                    # code...
                    $delete_item = $this->delete_object($orderitemsobject,$orderitem->id);
                }

                $delete_order = $this->delete_object($orderobject,$orderdata->id);
                return response()->json(['success' => true, 'message' =>__('message.delect_successfully')],200);
            }
            else{
               return response()->json(['success' => false, 'message' =>__('message.order_not_deleteable')],400); 
            }
        }
        else{
            /*only item delete*/
           
            $check_result = $this->orderdeleteable($orderobject,$orderitemsobject,$orderdata->id,$id);
           
               if($check_result == true){
                   $msg = __('message.delect_successfully');
                $delete_order = $this->delete_object($orderitemsobject,$id,$msg);
                
                return $delete_order;
            }
            else{
               return response()->json(['success' => false, 'message' =>__('message.order_not_deleteable')],400); 
            }
        }
    }

    public function orderdeleteable($order,$orderitems,$orderid,$order_details_id = null){
        if(empty($order_details_id)){

            return true;
        }
        else{

            return true;
        }
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

    /*after cheching now api*/

    public function search_product(Request $request){
       $data = $request->only('search_input');
        $validator = Validator::make($data, [
              'search_input' => 'required',
                ]); 
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

    }

}

