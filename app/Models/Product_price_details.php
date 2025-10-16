<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_price_details extends Model
{
    use HasFactory;
    protected $table = "product_price_details";
    protected $table = "supplier_info";
       protected $fillable = [
        'product_info_id',
        'varient_info_id',
        'supplier_price',
        'country_id',
    ];

    public static function createProductPriceInfo($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateProductPriceInfo($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
