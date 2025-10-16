<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address_info extends Model
{
    use HasFactory;
     protected $fillable = [
        'rel_id',
        'type',
        'address',
        'unit',
        'zone',
        'country_id',
        'first_name',
        'last_name',
        'post_code',
        'state',
        'town_city',
        'apartment',
        'email_address',
        'phone',
        'tyle'
    ];


    public static function createAddress($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateAddress($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
     public function country()
    {
        return $this->belongsTo(Country_info::class,'country_id','id');
    }
}
