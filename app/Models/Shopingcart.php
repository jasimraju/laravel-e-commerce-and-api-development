<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopingcart extends Model
{
      use HasFactory;
    protected $table = "shoping_cart";
         protected $fillable = [
        'cache_id',
        'user_id',
        'user_ip',
           ];

    public static function createShopingcart($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateShopingcart($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
     public function shopingdetails(){
            return $this->hasMany(Shopingcartdetails::class,'shoping_cart_id','id');
        }

}
