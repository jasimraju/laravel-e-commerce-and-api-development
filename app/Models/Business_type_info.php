<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_type_info extends Model
{
    use HasFactory;
    protected $table = "business_type_infos";
     protected $fillable = [
        'type_of_business',
        'business_code_alphabet',
        'business_code_numerical',
        'defination',
    ];

    public static function createBusinesstype($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateBusinesstype($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
