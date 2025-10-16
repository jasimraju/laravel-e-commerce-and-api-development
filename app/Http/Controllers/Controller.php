<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\MenuItems;
use App\Models\SubMenu;
use App\Models\App_setting;
use Auth;
use Cart;
use Cache;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




     public function showallmenu($type){
        $menuitems = MenuItems::with('childmenu')->where('status',1)->where('menu_id',$type)->orderBy('order')->get();
       
        return $menuitems;
    }
    /*slider and title*/
/*    public function slider_meta_title($object,$routename){
      $alltitle = array( );
      $alltitle['objects'] =  $object::with(['slider'  => function($qr){
        $qr->with('image')->with('sliderbutton.link');
      }])->where('route',$routename)->first();
      return $alltitle;

    } */
    
     public function slider_meta_title($object,$routename){

      $alltitle = array( );
      $alltitle['objects'] =  $object::with(['slider'  => function($qr){
        $qr->with('image')->with('sliderbutton.link');
      }])->where('route',$routename)->first();
    
      $alltitle['app_setting'] = App_setting::with('favicon')->with('applog')->with('address')->first();
      
      return $alltitle;

    } 

     public function addimage($image,$imageName,$ext,$folder_location){
                        $data['name'] = $imageName;
                        $data['upload_user_id'] = Auth::user()->id;
                        $data['image_ext'] = (!empty($ext)) ? $ext : Null;
                        $data['folder_location'] = (!empty($folder_location)) ? $folder_location : Null;;
                     
                        $saveimage = $image::createImage($data);
                        return $saveimage;
                    }

        public function ojectImage($oject_Image,$image_id,$object_id,$type,$status){
                                $data['image_id'] = $image_id;
                        $data['object_id'] = $object_id;
                        $data['object_type'] = $type;
                        $data['object_status'] = $status;
                     
                        $saveimage = $oject_Image::createObjectimage($data)->save();
                        return $saveimage;
                }

    public function parent_catlist($catgoriy,$details = null,$type=null,$key=null){
       
        if(!empty($details) && empty($type)){
          $categorylist = $catgoriy::with('image')->get();
            $cat_array = $this->category_array($categorylist);
            return $cat_array;
        }
        if(!empty($type) && !empty($details)){
          if(is_array($type)){
           $categorylist = $catgoriy::whereIn($key,$type)->with('image')->get();
           $cat_array = $this->category_array($categorylist);
            return $cat_array;
          }
          else{
            $categorylist = $catgoriy::where($key,$type)->with('image')->get();
           $cat_array = $this->category_array($categorylist);
            return $cat_array;
          }


        }
         $categorylist = $catgoriy::with('image')->get();
        return $categorylist;
    }

    public function submenu($routename){
        $menuitem = MenuItems::where('route',$routename)->first();
        $submenuitems = SubMenu::where('menu_items_id',$menuitem->id)->get();
        return $submenuitems;
    }

    public function parent_productlist($products,$category=null,$details=null){
        if(empty($category)){
        $product = $products::with('category','unit','country','brand','halal')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q){
            $q->with('image','supplier')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
        }])->get();


        
        
    }
    else{
        if(is_array($category)){
        $product = $products::with('category','unit','country','brand','halal')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q){
            $q->with('image','supplier')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
             
        }])->whereIn('category_info_id',$category)->get();
            
        }
        else{
             $product = $products::with('category','unit','country','brand','halal')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q){
            $q->with('image','supplier')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
             
        }])->where('category_info_id',$category)->get();
        }
        
    }
    if(!empty($details)){
        $productlist = $this->product_array($product);
        return $productlist;
    }
        /*web site data*/
     $productlist = $this->product_array($product);
    
        return  $productlist;
    
    
    }

    public function brokenproductid($id){
        //product_varient_supplier
        $product_id = explode('_', $id);
        return $product_id;
    } 

    public function shopcartid($shopingcart){
           $rendon_number = generateRandomStr(45);
           
    $session_key_number =  sessionStart('session_rendom',$rendon_number);

    
    if (Cache::has('session_key')) {
    //
        Cache::forever('session_key', []);
 

      $session_value = Cache::get('session_key');
    
      if (!in_array($session_key_number,$session_value)) {

        array_push($session_value, $session_key_number);
        Cache::forever('session_key', $session_value);
        /*inset only*/
        if (Auth::check()) {
            $rData['user_id'] = Auth::user()->id;
        }
        $rData['cache_id'] = $session_key_number;
        $shopingcart::createShopingcart($rData);
      }
        else{
          /*error page*/
          echo '404';
      }
      
      
        }
else{
    $session_value = [$session_key_number];
    Cache::forever('session_key', $session_value);
     if (Auth::check()) {
            $rData['user_id'] = Auth::user()->id;
        }
    $rData['cache_id'] = $session_key_number;
     /*inset only*/
     $shopingcart::createShopingcart($rData);
}
if (Auth::check()) {
    $user_id = Auth::user()->id;
    $user_cart_id = $shopingcart::where('cache_id',$session_key_number)->where('user_id',$user_id)->first();
}
else{
    $user_cart_id = $shopingcart::where('cache_id',$session_key_number)->first();
}
    return $user_cart_id;
    }

    public function wislisttid($wishlist,array $data){
           $rendon_number = generateRandomStr(45);
           $rData = $data;
    $session_key_number =  sessionStart('session_wish_rendom',$rendon_number);

    
    if (Cache::has('session_wishlist_key')) {
    //
        Cache::forever('session_wishlist_key', []);
 

      $session_value = Cache::get('session_wishlist_key');
    
      if (!in_array($session_key_number,$session_value)) {

        array_push($session_value, $session_key_number);
        Cache::forever('session_wishlist_key', $session_value);
        /*inset only*/
        
        /*check product exist in this user and cache id*/
        if(Auth::check()){
            $exitwislist = $wishlist::where('user_id',Auth::user()->id)->where('object_p_id',$rData['object_p_id'])->first();
        }
        else{
        $exitwislist = $wishlist::where('cache_id',$session_key_number)->where('object_p_id',$rData['object_p_id'])->first();
    }
       if(empty($exitwislist)){
        $rData['cache_id'] = $session_key_number;
        $rData['user_id'] = (Auth::check()) ? Auth::user()->id : NULL;

        
        $wishlist::createWishlist($rData);
    }
      }
      
      
        }
else{
    $session_value = [$session_key_number];
    Cache::forever('session_wishlist_key', $session_value);
    
    $rData['cache_id'] = $session_key_number;
     /*check product exist in this user and cache id*/
        
        $rData['cache_id'] = $session_key_number;
        $rData['user_id'] = (Auth::check()) ? Auth::user()->id : NULL;
        
     /*inset only*/
     $wishlist::createWishlist($rData);
}
if (Auth::check()) {
    $user_id = Auth::user()->id;
    $user_cart_id = $wishlist::where('cache_id',$session_key_number)->where('user_id',$user_id)->first();
}
else{
    $user_cart_id = $wishlist::where('cache_id',$session_key_number)->first();
}
    return $user_cart_id;
    }


function get_cache($key)
{
return Cache::get($key);
}

function show_shoping_cart($cardmod){
    if (!empty(sessionSet('session_rendom')) && Cache::has('session_key')) {

        $cache_id = $this->get_cache('session_key');
        $session_id = sessionSet('session_rendom');
       
        if(in_array($session_id,$cache_id)){
            if(Auth::check()){
                 $shopingcart = $cardmod::with('shopingdetails')->where('user_id',Auth::user()->id)->where('cache_id',$session_id)->first();
          return $shopingcart;
            }
            else{
               $shopingcart = $cardmod::with('shopingdetails')->where('cache_id',$session_id)->first();
          return $shopingcart;  
            }
         
        }
        else{
          $shopingcart = NULL;
          return $shopingcart;
        }
      }
}
function show_wishlist($cardmod){
    if(Auth::check()){
            /**/
            $shopingcart = $cardmod::where('user_id',Auth::user()->id)->where('type',1)->get();

            return $shopingcart;
        }
    elseif (!empty(sessionSet('session_wish_rendom')) && Cache::has('session_wishlist_key')) {

        $cache_id = $this->get_cache('session_wishlist_key');
        $session_id = sessionSet('session_wish_rendom');
       
        if(in_array($session_id,$cache_id)){
         /**/
         $shopingcart = $cardmod::where('cache_id',$session_id)->where('type',1)->get();
               
          return $shopingcart;  
           
         
        }
        elseif(Auth::check()){
            /**/
            $shopingcart = $cardmod::where('user_id',Auth::user()->id)->where('type',1)->get();
        }
        else{
            /**/
          $shopingcart = NULL;
          return $shopingcart;
        }
      }
}

function removeFromcache($session_key){
     $session_value = Cache::get('session_key');
      if (($key = array_search($session_key, $session_value)) !== false) {
    unset($session_value[$key]);
}
Cache::forever('session_key', $session_value);

}

public function category_array($cats)
{
    $category_array = [];
    $i=0;
    foreach ($cats as $cat) {
        # code...

        $category_array[$i]['id'] = $cat->id;
        $category_array[$i]['name'] = __($cat->language_file_name.'.'.$cat->name);
        $category_array[$i]['description'] = __($cat->language_file_name.'.'.$cat->description);
        $category_array[$i]['more_details'] = __($cat->language_file_name.'.'.$cat->more_details);
        $category_array[$i]['background_color'] =$cat->bg_color;
        $category_array[$i]['image_url'] =asset('public/storage'.$cat->image[0]->folder_location.'/'.$cat->image[0]->name);
        $category_array[$i]['parent_id'] = $cat->parent_id;
        $i++;
    }
    return $category_array;
 
}
public function product_array($products){

    $product_array = [];
    $i=0;
    if(!empty($products)){
    foreach ($products as $product) {
        # code...
     
        $discount['first'] = 'no';
        if(!$product->discount->isEmpty()){
           
               $discount = $this->discount_cal($product,1); 
            }
            else{
                
                if(!empty($product->p_discount)){
                    $discount =  $this->discount_cal($product,6);
                }

            }
        if(!empty($product->varient)){

        foreach($product->varient as $varient){
            $price = pricecal($varient->rsp_w_gst,$varient->gp_percentage);
            if($discount['first'] == 'yes'){
                $vwis_discount = $this->discount_u_cal($discount,$price);
                 $vwis_discount['end_date'] = $discount['end_date'];
            }
            elseif(!$varient->discount->isEmpty() && ($discount['first']=='yes' ||$discount['first']=='no'  )){
                $discount = $this->discount_cal($varient,2);
                $vwis_discount = $this->discount_u_cal($discount,$price);
                 $vwis_discount['end_date'] = $discount['end_date'];
            }
            else{
                if(!empty($varient->v_discount)){
                    $discount = $this->discount_cal($varient);
                    $vwis_discount = $this->discount_u_cal($discount,$price);
                    $vwis_discount['end_date'] = $discount['end_date'];
                }
                else{
                     $vwis_discount['d_amount'] = 0;
                     $vwis_discount['d_parcentage'] = 0;
                     $vwis_discount['end_date'] = '';
                }


            }
            $product_array[$i]['brand_name'] = $product->brand->name;
            $product_array[$i]['brand_id'] = $product->brand->id;
            $product_array[$i]['name'] = $product->online_display_name.' '.$varient->varient_name;
            $product_array[$i]['price'] = $price;
            $product_array[$i]['currency_sign'] = 'S$';
            $product_array[$i]['product_id'] = $product->id;
            $product_array[$i]['supplier_name'] = $varient->supplier->supplier_name;
            $product_array[$i]['supplier_id'] = $varient->supplier->id;
            $product_array[$i]['unit_name'] = $product->unit->unit_name;
            $product_array[$i]['unit_quantity'] = $varient->unit_of_quantity;
            $product_array[$i]['varient_id'] = $varient->id;
            $product_array[$i]['discount_parcentage'] = (float) $vwis_discount['d_parcentage'];
            $product_array[$i]['discount'] = $vwis_discount['d_amount'];//parcentage;
            $product_array[$i]['end_date'] = $vwis_discount['end_date'];
            $product_array[$i]['image_url'] = asset('public/storage'.$varient->image[0]->folder_location.'/'.$varient->image[0]->name);//parcentage;
            $i++;
        }
        
    }
        
    }
    }
    
    return $product_array;
}

  public function checkUser($user,$value,$key=null){
        if(empty($key)){
        $user_data = $user::where('id',$value)->first();
            }
            else{
                $user_data = $user::where($key,$value)->first();
            }
if (empty($user_data)) {
   return false;
}
else{
    return $user_data;
}
    }

function get_silder($object,$type,$from = null){
    $silders = $object::with('image')->where('type',$type)->get();

    if(!empty($silders)){

        return $this->convert_json_get_sider($silders);
    }
    else{
        return $silders;
    }
}
function convert_json_get_sider($siders){
           $get_silder = [];
    $i=0;
    foreach ($siders as $sider) {
        # code...

        $get_silder[$i]['title'] = $sider->title;
        $get_silder[$i]['description'] = $sider->description;
        $get_silder[$i]['background_color'] = $sider->bg_color;
        $get_silder[$i]['tag_line'] = $sider->tag_line;
        $get_silder[$i]['image'] = asset('public/storage'.$sider->image[0]->folder_location.'/'.$sider->image[0]->name);
   
                $i++;
    }
    return $get_silder;
    }

  private function discount_cal($object,$product_yes = null){
  /*1 = product 2 = variant 3 = catgory 4= supplier 5 = brand empty = direct discounts by varient*/
  $discount = [];
  if($product_yes == 1){
    /*product weekly*/
    $discount['amount'] = $object->discount[0]->p_or_amount;
    $discount['first'] = 'yes';
    $discount['discount_type'] = $object->discount[0]->p_type;
    $discount['end_date']= $object->discount[0]->end_date_time;

   return $discount;


  } 
  elseif ($product_yes == 2) {
    /*variant weekly*/
       # code...
       $discount['amount'] = $object->discount[0]->p_or_amount;
        $discount['discount_type'] = $object->discount[0]->p_type;
        $discount['end_date']= $object->discount[0]->end_date_time;
        
   return $discount;
    
   } 
   elseif ($product_yes == 3) {
    /*catgory weekly*/
       # code...
     $discount['amount'] = $object->discount[0]->p_or_amount;
     $discount['first'] = 'yes';
    $discount['discount_type'] = $object->discount[0]->p_type;
    $discount['end_date']= $object->discount[0]->end_date_time;
   return $discount;
   }
   elseif($product_yes == 4){
    /*supplie weeklyr*/
       $discount['amount'] = $object->discount[0]->p_or_amount;
 
    $discount['discount_type'] = $object->discount[0]->p_type;
    $discount['end_date']= $object->discount[0]->end_date_time;
   return $discount;
   }
    elseif ($product_yes == 5) {
    /*brand weekly*/
       # code...
     $discount['amount'] = $object->discount[0]->p_or_amount;
     $discount['first'] = 'yes';
    $discount['discount_type'] = $object->discount[0]->p_type;
    $discount['end_date']= $object->discount[0]->end_date_time;
   return $discount;
   }
   elseif ($product_yes == 6) {
    /*product direct discount*/

       # code...
         $discount['amount'] = $object->p_discount;
 $discount['first'] = 'yes';
    $discount['discount_type'] = $object->p_discount_type ;

    $discount['end_date']= false;
    return $discount;
   }
   else{
    /*varient direct discount*/
    $discount['amount'] = $object->v_discount;

    $discount['discount_type'] = $object->v_discount_type ;
    $discount['end_date']= false;
    return $discount;

   }
    }
    /*end discount_cal*/
    private function discount_u_cal($discount,$price){
        $return_value = [];
        if($discount['discount_type'] ==1 ){
            /*cal percentage*/

            $d_amount = ($discount['amount']*$price)/100;
            $return_value['d_amount'] = $d_amount;
            $return_value['d_parcentage'] = $discount['amount'];
        }
        else{
           
          $return_value['d_amount'] = $discount['amount'];
            $return_value['d_parcentage'] = ($discount['amount']*100)/$price;  
        }
        return $return_value;

    }
    
    public function parent_vanlist($varient,$condtion=null,$details = null,$key = null){
         if(empty($condtion)){
             /*all varient*/
            $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=>  function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient');
        }])->get();
        }
        elseif (is_array($condtion)) {
            /*in numbers for id varient */
           $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=> function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient');
        }])->whereIn($key,$condtion)->get();
      
        }
        else{
            /*unique varient*/
            $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=> function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient');
        }])->where($key,$condtion)->get();
        }
        
        if(!empty($details)){
            $varient_array = $this->varient_array($varientlist);
          
            return $varient_array;
        }
        return $varientlist;
    }
public function varient_array($varients,$details = null){

    $product_array = [];
    $i=0;
    
        
    
        foreach($varients as $varient){
            $discount =[];
            $discount['first'] = 'no';
             $price = pricecal($varient->rsp_w_gst,$varient->gp_percentage);
             #first count weekly discont
            if(!$varient->product->discount->isEmpty()){
           
               $discount = $this->discount_cal($varient->product,1); 
            }
            else{
                
                if(!empty($varient->product->p_discount)){
                    $discount =  $this->discount_cal($varient->product,6);

                }

            }
            #count product discount first
            #if product discont varient discount not count

            
            if($discount['first'] == 'yes'){
                $vwis_discount = $this->discount_u_cal($discount,$price);
                $vwis_discount['end_date'] = $discount['end_date'];
            }
            #first count weekly discount
            #if not then count check fixit discount
            elseif(!$varient->discount->isEmpty() && ($discount['first']=='yes' ||$discount['first']=='no'  )){
                $discount = $this->discount_cal($varient,2);
                $vwis_discount = $this->discount_u_cal($discount,$price);
                $vwis_discount['end_date'] = $discount['end_date'];
            }
            else{
                if(!empty($varient->v_discount)){
                    $discount = $this->discount_cal($varient);
                    $vwis_discount = $this->discount_u_cal($discount,$price);
                    $vwis_discount['end_date'] = $discount['end_date'];
                }
                else{
                     $vwis_discount['d_amount'] = 0;
                     $vwis_discount['d_parcentage'] = 0;
                     $vwis_discount['end_date'] = '';

                }


            }
           
            $product_array[$i]['brand_name'] = $varient->product->brand->name;
            $product_array[$i]['brand_id'] = $varient->product->brand->id;
            $product_array[$i]['name'] = $varient->product->online_display_name.' '.$varient->varient_name;
            $product_array[$i]['price'] =  $price;
            $product_array[$i]['currency_sign'] = 'S$';
            $product_array[$i]['product_id'] = $varient->product->id;
            $product_array[$i]['supplier_name'] = $varient->supplier->supplier_name;
            $product_array[$i]['supplier_id'] = $varient->supplier->id;
            $product_array[$i]['unit_name'] = $varient->product->unit->unit_name;
            $product_array[$i]['unit_quantity'] = $varient->unit_of_quantity;
            $product_array[$i]['varient_id'] = $varient->id;
            $product_array[$i]['discount_parcentage'] = (float) $vwis_discount['d_parcentage'];
            $product_array[$i]['discount'] = $vwis_discount['d_amount'];//parcentage;
            
            $product_array[$i]['image_url'] = asset('public/storage'.$varient->image[0]->folder_location.'/'.$varient->image[0]->name);//parcentage;
            if(!empty($details)){
              $product_array[$i]['category_name'] = __($varient->product->category->language_file_name.'.'.$varient->product->category->name);
              $product_array[$i]['end_date'] = $vwis_discount['end_date'];
                $product_array[$i]['description'] = $varient->product->online_key_information;
            }
            $i++;
        }
        
    
        
 
    
    return $product_array;
}

    public function unique_vanlist($varient,$condtion=null,$details = null,$key = null,$product = null){
     
      /*unique varient*/
                $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=> function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient')->with('halal.image');
        }])->where($key,$condtion)->get();

      
        $date_array =[];
        if(!empty($details)){
            $varient_array = $this->varient_array($varientlist,2);
          if(!($varientlist[0]->discount->isEmpty()) ||  !($varientlist[0]->product->discount->isEmpty())){
              /*check produdct*/
              if(!($varientlist[0]->product->discount->isEmpty())){
                 $date_array = $this->differtwodate($varientlist[0]->product->discount[0]->end_date_time); 
              }
              /*check varient*/
              if(!($varientlist[0]->discount->isEmpty())){
                $date_array = $this->differtwodate($varientlist[0]->discount[0]->end_date_time);  
              }
          }
          if(!empty($date_array)){
            $prmo_text  = $this->create_protext($date_array);  
          }
          $varproduct = $varientlist[0]->product;
          $varientlist = $this->varientlist_prodetails($varproduct->varient);
          $halal_details = $this->halal_prodetails($varproduct->halal);
          $similar_product = $this->similar_product($product);
          
          $product_details = array('product_details'=>$varient_array,'varient_list'=> $varientlist,'halal_cer' =>$halal_details,'similar_product'=>$similar_product );
            return $product_details;
        }
        $varient_array = $this->varient_array($varientlist,2);
        return $varient_array;
    }
    public function differtwodate($date2){
        $date1 = date("Y-m-d H:i:s");; 

       $date_array = []; 

        $diff = abs(strtotime($date2) - strtotime($date1)); 

        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
        $date_array['year'] = $years;
        $date_array['month'] = $months;
        $date_array['day'] = $days;
        $date_array['hour'] = $hours;
        $date_array['minuts'] =$minuts;
        $date_array['seconds'] =  $seconds;
        return $date_array;
         }
         
    public function create_protext($date_array){
        $text = "Promotions end in ";
        if($date_array['year'] != 0){
            $text = $text." ".$date_array['year']." years";
        }
         if($date_array['month'] != 0){
            $text = $text." ".$date_array['month']." months";
        }
        
         if($date_array['day'] != 0){
            $text = $text." ".$date_array['month']." days";
        }
        
          if($date_array['hour'] != 0){
            $text = $text." ".$date_array['hour']." hrs";
        }
             if($date_array['minuts'] != 0){
            $text = $text." ".$date_array['minuts']." mins";
        }
            if($date_array['seconds'] ==0){
            $text = $text." ".$date_array['seconds']." sec";
        }
        return $text; 
    } 
    
    public function varientlist_prodetails($object){
        $varient_array = [];
        $i=0;
        foreach($object as $varient){
            $varient_array[$i]['varient_id'] = $varient->id;
            $varient_array[$i]['varient_name'] = $varient->varient_name;
            $i++;
        }
        return  $varient_array;
    }
    public function halal_prodetails($object){
        $haladetails = [];
        $i=0;
        foreach($object as $halal){
            $haladetails[$i]['authority_name'] = $halal->authority;
            $haladetails[$i]['image'] = asset('public/storage'.$halal->image[0]->folder_location.'/'.$halal->image[0]->name); 
            $i++;
        }
        return $haladetails;
    }
    /*need update later*/
    public function similar_product($product){
                     $similar =  $product::with('category','unit','country','brand','halal')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q){
            $q->with('image','supplier')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
        }])->skip(0)->take(4)->get();
       
         $productlist = $this->product_array($similar);
         
         return $productlist;
    }
 public function unique_product_or_varient($products,$varient_id,$product_id){
          $product = $products::with('category','unit','country','brand','halal')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q) use ($varient_id) {
            $q->with('image','supplier')->where('id',$varient_id)->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
             
        }])->where('id',$product_id)->get();
        $productlist = $this->product_array($product);
        return $productlist;
 }
 
    public function create_order($orderdetails,$data)
        {
            $order = $orderdetails::createOrder($data);
            return $order;
        }
     public function create_orderdetails($orderdetails,$data)
        {
            $orderdetails = $orderdetails::createOrderdetails($data);
            return $orderdetails;
        }
    public function create_delivery($deliverdetails,$data){
         $orderdetails = $deliverdetails::createDelivryinfo($data);
            return $orderdetails;
    }
    public function check_promocode($object,$data)
    {
        $return_array = [];
        $promocode = $data['promo_code'];
        $checkpromo = $object::where('p_code',$promocode)->first();
        
        if(!empty($checkpromo)){
            $return_array['success'] = true;
            $return_array['discount_type'] = $checkpromo->discount_type;
            $return_array['discount_amount'] = $checkpromo->discount_amount;
            $return_array['promo_code_id'] = $checkpromo->id;
            return $return_array;
        }
        else{
            /*when invalid promo code*/
            $return_array['success'] = false;
            $return_array['msg'] = "your promo code invalid";
            return $return_array;
        }
        
    }
    public function cal_discount($type,$amount,$total){
        $discount = [];
        if($type == 1){
            /*parchantage cal*/
            $pr_amount = ($amount*$total)/100;
            $totalamount = $total - $pr_amount; 
        }
        else{
            /*fixit cal*/
            $pr_amount = $amount; 
            $totalamount = $total - $amount; 
        }
        $discount['discount_amount'] = $pr_amount;
        $discount['total'] = $total;
        return $discount;
    }

  public function check_weeklydeals($weeklydeal,$varientobject,$option = null){
    $today = date("Y-m-d H:i:s");
     $weeldealsproduct = $weeklydeal::with('product.varient')->with('variant')->with('category.product.varient')->with('band.product.varient')->where('start_date_time', '<=', $today)->where('end_date_time', '>=', $today)->get();
     $vaientlist = $this->check_weeklydetails($weeldealsproduct);
    
     $productlist = $varientobject::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=> function($q){
            $q->with('brand','unit','category')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
        }])->whereIn('id',$vaientlist)->get();
            if(empty($option)){
            $varient_array = $this->varient_array($productlist);
          }
          else{
            $varient_array = $this->varient_array($productlist,$option);
          }
     return $varient_array;

  }

  protected function check_weeklydetails($weeklyobjects)
  {

    $product_varient_list=[];
    $varient_list=[];
    $category_varient_list=[];
    $band_varient_list =[];
    foreach ($weeklyobjects as $weeklyobject) {
      # code...
      if(!$weeklyobject->product->isEmpty()){
        #check poduct discount

        $product_varient_list = $this->product_weeklydesicount($weeklyobject->product,$product_varient_list);

      }
      if(!$weeklyobject->variant->isEmpty()){
        #check varient wise discount
         $varient_list = $this->varient_weeklydesicount($weeklyobject->variant,$varient_list);
      }
       if(!$weeklyobject->category->isEmpty()){
        #check categroy wise discount
        $category_varient_list = $this->varient_weeklydesicount($weeklyobject->category,$category_varient_list);
      }
       if(!$weeklyobject->band->isEmpty()){
        #check band wise discount
        $band_varient_list = $this->varient_weeklydesicount($weeklyobject->category,$band_varient_list);
      }
    }
 
 $list = array_unique(array_merge($product_varient_list,$varient_list,$category_varient_list,$band_varient_list), SORT_REGULAR);

    return $list;

  }

  protected function product_weeklydesicount($product_w,$varient_list)
  {

    $i = count($varient_list);
    foreach ($product_w as $product) {
      # code...

      $varient_array = $this->varient_array($product->varient);

      
      foreach($varient_array as $varient){
        $varent_lsit[$i] = $varient['varient_id'];
        $i++;
      }


    }

    return $varent_lsit;

  }
  protected function varient_weeklydesicount($varient_w,$varient_list)
  {
   $i = count($varient_list);

    $varient_array = $this->varient_array($varient_w);
     
      foreach($varient_array as $varient){
       
        $varient_list[$i] = $varient['varient_id'];
        $i++;
      }

      return $varient_list;
  }
  protected function category_weeklydesicount($category_w)
  {
    $varient_list = [];
    foreach ($category_w as $category) {
      # code...
      $category_details = [];
      foreach ($category->product as $product) {
        # code...
        $category_details = $this->product_weeklydesicount($product);
       $varient_list =  array_merge($varient_list,$category_details);
      }
    }
    return $varient_list;
  }

    /*send mail*/
 public function sendforgetpassword($data,$name)
     {


          $subject = 'Request for Password Reset';
          $details['hi'] = "Dear ".$name;
          $details['line'] = "You requested for password reset. If you are a web user, please use the folowing link to proceed to the next step ";
          $details['line1'] = "<a href='".route('front.log.forgetpassword_rest',$data['token'])."'> Go link </a>";
          $details['line2'] = "If you are a mobile user, please use the OTP below";
          $details['line3'] = $data['email_opt'];
          $details['line4'] = "Please note that the above link/ OTP will expire in 10 minutes.";
          $details['line5'] = "Thanks,";
          $details['line6'] = "Fresh Pasar";
          $viewpage = 'layouts.customer.email.forgetpassword';
         
          $email = trim($data['email']);
                  Mail::to($email)->send(new \App\Mail\Allmailsend($subject,$details,$viewpage));
                  
           
      }

      function difftwotime($carbon,$endtime,$starttime = null){
        $date = $carbon::parse($endtime);
        if(empty($starttime)){
          $now = $carbon::now();
        }
        else{
           $now = $carbon::parse($starttime);
        }
         $diff = $now->diff($date)->format('%M:%D:%H:%I:%S');

         $diff_array = explode(':', $diff);
         $prmo_text = "Promotion ends in ";
         if($diff_array[0] != 00){
          $prmo_text = $prmo_text.' '.$diff_array[0].' months';
         }

         if($diff_array[1] != 00){
          $prmo_text = $prmo_text.' '.$diff_array[1].' days';
         }
           if($diff_array[2] != 00){
          $prmo_text = $prmo_text.' '.$diff_array[2].' hrs';
         }
         else{
           $prmo_text = $prmo_text.' '.$diff_array[3].' hr';
         }

           if($diff_array[3] != 00){
          $prmo_text = $prmo_text.' '.$diff_array[3].' mins';
         }
         else{
           $prmo_text = $prmo_text.' '.$diff_array[3].' min';
         }
        return $prmo_text;



      }


      public function all_hot_product_web($product,$category_id = null){
   if(empty($category_id)){
     $productlist =  $this->parent_productlist($product,null,2);
   }
   else{
    $productlist =  $this->parent_productlist($product,$category_id,2);
   }
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
      return $newproductlist;
     
        }
      }

      function showallvarient($varient,$start,$end,$cat_id=null){
        if(empty($cat_id)){
        
        $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=> function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient');
        }])->skip($start)->take($end)->get();
            
          }
          else{
            /*catgories*/
               $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->whereHas('product', function($q) use ($cat_id) {
    $q->where('category_info_id', $cat_id);
})->with(['product'=> function($q) use ($cat_id) {
            $q->where('category_info_id',$cat_id)->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($qy){
                    $today = date("Y-m-d H:i:s");
                     $qy->where('start_date_time', '<=', $today);
                     $qy->where('end_date_time', '>=', $today);
                });
            }]);
        }])->skip($start)->take($end)->get();
    
          }
      $varient_array = $this->varient_array($varientlist,2);
      return $varient_array;
      }

      function varientCount($varient,$cat_id = null){
        if(!empty($cat_id)){
        $varientcount = $varient::whereHas('product', function($q) use ($cat_id) {
    $q->where('category_info_id', $cat_id);
})->count(); 
        }
        else{
          $varientcount = $varient::count(); 
        } 
        return $varientcount;  
      }

      function pagination_setting(){

          $pagenunumber = 4;

          return $pagenunumber;
      }
     
     public function delete_object($object,$id,$msg = null){
         $delete_object_ext = $object::find($id);
         if(!empty($delete_object_ext)){
        $delete_object = $object::find($id)->delete();
        if(!empty($msg)){
        return response()->json(['success' => true, 'message' => $msg],200);
        }
        else{
         return $delete_object;
        }
         }
         else{
             return response()->json(['success' => false, 'message' =>__('message.item_not_exit_in_our_database')],400);exit; 
         }
       
    }

    public function supplier_list($object,$details =null){
      $object_list = $object::with('image')->get()->toArray();
      return $object_list;
    }

    public function parent_productlist_show($products){
        
        $product = $products::with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with(['varient'=>function($q){
            $q->with('image','supplier')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }]);
        }])->get();

          $productlist = $this->product_array($product,2);
         
        return $productlist;

        
        
    
  }

  public function all_varient($varient){
       $varientlist = $varient::with('image')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('supplier')->with(['product'=>  function($q){
            $q->with('brand','unit')->with(['discount' => function($qr){
                $qr->where(function($q){
                    $today = date("Y-m-d H:i:s");
                     $q->where('start_date_time', '<=', $today);
                     $q->where('end_date_time', '>=', $today);
                });
            }])->with('varient');
        }])->get();

            $varients = $this->varient_array($varientlist);

            return $varients;
  }

   public function showCatgorywithproduct($object,$id){
    $list = [];
    $product_list = [];
    $varient_list = [];
    if(is_array($id) && !empty($id)){
    $list_info = $object::whereIn('id',$id)->with(['product' => function($q){
      $q->with('varient');
    }])->get();
    
    foreach($list_info as $listing){
      $product_list_data = $listing->product->pluck('id')->toArray();
      $product_list = $this->margeArray($varient_list,$product_list_data);
      foreach ($listing->product as $product) {
        $varient_list_data = $product->varient->pluck('id')->toArray();
      $varient_list = $this->margeArray($varient_list,$varient_list_data);
      }
    }
   $list['varient_list'] = $varient_list;
  $list['product_list'] = $product_list;
    return $list;
    
  }
  if(empty($list)){
     $list['varient_list'] = [];
  $list['product_list'] = [];
  return $list;
  }

   }

   public function showbanerwithproduct($object,$id){
    $list = [];
    $product_list = [];
    $varient_list = [];
    if(is_array($id) && !empty($id)){
    $list_info = $object::whereIn('id',$id)->with(['product' => function($q){
      $q->with('varient');
    }])->get();
    
       foreach($list_info as $listing){
      $product_list_data = $listing->product->pluck('id')->toArray();
      $product_list = $this->margeArray($product_list,$product_list_data);
      foreach ($listing->product as $product) {
        $varient_list_data = $product->varient->pluck('id')->toArray();
      $varient_list = $this->margeArray($varient_list,$varient_list_data);
      }
    }
   $list['varient_list'] = $varient_list;
  $list['product_list'] = $product_list;
    return $list;
    
  }
  if(empty($list)){
     $list['varient_list'] = [];
  $list['product_list'] = [];
  return $list;
  }


   }

    public function showsupplierwithproduct($object,$id){
    $list = [];
    $varient_list = [];
    $product_list = '';
    if(is_array($id) && !empty($id)){
    $list_info = $object::whereIn('id',$id)->with(['varient' => function($q){
      $q->with('product');
    }])->get();
    foreach($list_info as $listing){
    $varient_list_data = $listing->varient->pluck('id')->toArray();
      $varient_list = $this->margeArray($varient_list,$varient_list_data);
    foreach($listing->varient as $varient){
      if(empty($product_list)){
        $product_list = $varient->product->id;
      }
      else{
      $product_list = $product_list.','.$varient->product->id;
    }
    }
    //
  }
  if(!empty($product_list)){
  $product_list = explode(',', $product_list);
  }
  else{
    $product_list = [];
  }
  $list['varient_list'] = $varient_list;
  $list['product_list'] = $product_list;
    return $list;
  }
  if(empty($list)){
     $list['varient_list'] = [];
  $list['product_list'] = [];
  return $list;
  }

   }

   public function showproductWithvarient($object,$id){
       $list = [];
    $product_list = [];
    $varient_list = [];
    if(is_array($id) && !empty($id)){
    $list_info = $object::whereIn('id',$id)->with('varient')->get();
    
       foreach($list_info as $listing){
       $varient_list_data = $listing->varient->pluck('id')->toArray();
      $varient_list = $this->margeArray($varient_list,$varient_list_data);
    
    }
   $list['varient_list'] = $varient_list;
  $list['product_list'] = $id;
    return $list;
    
  }
  if(empty($list)){
     $list['varient_list'] = [];
  $list['product_list'] = [];
  return $list;
  }
   }


   public function showvarientwithproduct($object,$id){
    $list = [];
    $varient_list = [];
    $product_list = '';
    if(is_array($id) && !empty($id)){
    $list_info = $object::whereIn('id',$id)->with('product')->get();
   
    foreach($list_info  as $varient){
      if(empty($product_list)){
        $product_list = $varient->product->id;
      }
      else{
      $product_list = $product_list.','.$varient->product->id;
    }
    }
    //
  
  if(!empty($product_list)){
  $product_list = explode(',', $product_list);
  }
  else{
    $product_list = [];
  }
  $list['varient_list'] = $id;
  $list['product_list'] = $product_list;
    return $list;
  }
  if(empty($list)){
     $list['varient_list'] = [];
  $list['product_list'] = [];
  return $list;
  }

   }

   public function margeArray(array $array1, array $array2){
    $uniquearray = array_unique(array_merge($array1,$array2), SORT_REGULAR);
    return $uniquearray;
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
            $order_history[$i]['item_text'] = $orderhistory->orderdetails_count;
            $order_history[$i]['total'] = $orderhistory->total;
            $order_history[$i]['currency'] = 'S$';
            $order_history[$i]['delivery_time_slot'] =$orderhistory->delivery->timeslot->start_time.' ~ '.$orderhistory->delivery->timeslot->end_time;
            $i++;
         
        }
            
        }
       
        return $order_history;
        
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

     public function ordervarientlist($varientlist)
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

                public function orderpricecal($price,$qty,$discount){
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

         public function checkorderdeletable($order,$id){
            return true;
        }

            public function show_admin_order($order,$key = null ,$value = null , $is_key_mutiple = null)
    {
        //
      if(empty($key)){
        $orders = $order::with('user')->with('paymentMethods')->with('admin')->with('shipaddress')->with('billingaddress')->with('orderstatus')->withCount('orderdetails')->with([
            'orderdetails' => function ($qry) {   
               $qry->select([
            'order_id', app('db')->raw('sum(price*qty) AS total_amount')
        ])
        ->groupBy('order_id');
            }
        ])->get();
      }
      else{
        if(empty($is_key_mutiple) && !is_array($key)){
                  $orders = $order::with('user')->with('paymentMethods')->with('admin')->with('shipaddress')->with('billingaddress')->with('orderstatus')->withCount('orderdetails')->with([
            'orderdetails' => function ($qry) {   
               $qry->select([
            'order_id', app('db')->raw('sum(price*qty) AS total_amount')
        ])
        ->groupBy('order_id');
            }
        ])->where($key,$value)->get();
        }
        elseif (empty($is_key_mutiple) && is_array($key)) {
                          $orders = $order::with('user')->with('paymentMethods')->with('admin')->with('shipaddress')->with('billingaddress')->with('orderstatus')->withCount('orderdetails')->with([
            'orderdetails' => function ($qry) {   
               $qry->select([
            'order_id', app('db')->raw('sum(price*qty) AS total_amount')
        ])
        ->groupBy('order_id');
            }
        ])->whereIn($key,$value)->get();
        }
        else{
          //done on after
        }
      }
        return $orders;
      }


          public function updateimage($image,$imageName,$ext,$folder_location,$id){
                        $data['name'] = $imageName;
                        $data['upload_user_id'] = Auth::user()->id;
                        $data['image_ext'] = (!empty($ext)) ? $ext : Null;
                        $data['folder_location'] = (!empty($folder_location)) ? $folder_location : Null;;
                     
                        $saveimage = $image::updateImage($data,$id);
                        return $saveimage;
                    }

        public function saveupdatedimage($data_category_image,$update_id_image,$image){
             if($data_category_image != $update_id_image){
              $path =  storage_path().'/app/public'.'/image';
             
                $logo_sm = img_process($data_category_image,$path);

                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                $folder_location = '/image';
                                
                    $saveimage = $this->updateimage($image,$imageName,$logo_sm[1],$folder_location,$update_id_image);
        }
          
        }
      
}
