<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country_info extends Model
{
    use HasFactory;
    protected $table = "country_infos";
       protected $fillable = [
        'name',
        'country_code',
        'country_currency_name',
        'country_currency_name',
        'country_currency_code',
        'iso_code',
        'min_digits',
        'max_digits',
        'language',
        
    ];

    public static function createCountry($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateCountry($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }

}
