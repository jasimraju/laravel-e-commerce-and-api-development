<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_team_info extends Model
{
    use HasFactory;
    protected $table = "sales_team_infos";
         protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'phone',
        'subsidairy_code',
        'staff_id_number',
        'commision_percentage',
        'status',
    ];

    public static function createSalesTeaminfo($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateSalesTeaminfo($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
