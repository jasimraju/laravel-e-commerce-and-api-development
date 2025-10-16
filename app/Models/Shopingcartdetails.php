<?php

namespace App\Models;
use App\Events\ShopingcartCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopingcartdetails extends Model
{
    use HasFactory;

     protected $dispatchesEvents = [
    'created' => ShopingcartCreated::class, //When a Shopingcartdetails is created then this Event will be fired
    'updated' => ShopingcartCreated::class, //When a Shopingcartdetails is created then this Event will be fired
    'deleted' => ShopingcartCreated::class, //When a Shopingcartdetails is created then this Event will be fired
  ];

   protected $fillable = [
        'cache_id',
        'user_id',
        'price',
        'image',
        'other',
        'discount',
        'shoping_cart_id',
        'qty',
        'varient_id',
        'title',
        'unit_details',
        'varient_id_value',
        'brand'
    ];


  public static function createShopingcartdetails($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateShopingcartdetails($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
