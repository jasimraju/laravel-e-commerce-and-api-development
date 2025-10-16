<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_setting extends Model
{
    use HasFactory;
         protected $fillable = [
        'app_name',
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'app_logo_id',
        'app_fev_icon',
        'address_id'
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

       public function favicon(){
         return $this->belongsTo(Image::class,'app_fev_icon');
    }
       public function applog(){
         return $this->belongsTo(Image::class,'app_logo_id');
    }
     public function address(){
         return $this->belongsTo(Address_info::class,'address_id');
    }

}
