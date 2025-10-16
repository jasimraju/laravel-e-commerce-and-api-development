<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_user_info extends Model
{
    use HasFactory;
    protected $table = "business_user_infos";
        protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'phone',
        'email',
        'company_name',
        'business_type_infos_id',
        'client_code',
        'uen_number',
        'status',
        'password',
        'load_area_stall_permit_or_permises_regristy',
    ];

    public static function createBusinessUser($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateBusinessUser($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}

