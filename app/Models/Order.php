<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paymentmethods;
use App\Models\Orderstatus;
use App\Models\Orderdetails;

class Order extends Model
{
    use HasFactory;

       
     protected $fillable = [
        'user_id',
        'payment_id',
        'admin_id',
        'shipaddress_id',
        'billingaddress_id',
        'delivery_id',
        'orderstatus_id',
        'email',
        'ip_address',
        'is_paid',
        'is_completed',
        'is_seen_by_admin',
        'is_delivered',
        'transaction_id',
        'order_from',
        'order_note',
        'order_ip',
        'order_sku',
        'promo_code',
        'promo_code_id',
        'discount_p',
        'total',
        'card_id',
        
    ];


    public static function createOrder($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateOrder($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }

     public function user(){
         return $this->belongsTo(User::class,'user_id');
    }

     public function paymentMethods(){
         return $this->belongsTo(Paymentmethods::class,'payment_id');
    }

     public function admin(){
         return $this->belongsTo(Admin_user::class,'admin_id');
    }

      public function shipaddress(){
         return $this->belongsTo(Address_info::class,'shipaddress_id');
    }   
    public function billingaddress(){
         return $this->belongsTo(Address_info::class,'billingaddress_id');
    } 
    public function orderstatus(){
         return $this->belongsTo(Orderstatus::class,'orderstatus_id');
    }
    public function orderdetails(){
         return $this->hasMany(Orderdetails::class,'order_id','id');
    }
     public function delivery(){
         return $this->hasOne(Delivryinfo::class,'order_id','id');
    }
}
