<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department_info extends Model
{
    use HasFactory;
    protected $table = "dept_info";
         protected $fillable = [
        'name',
        'description',
        'div_info_id',
        
    ];

    public static function createDepartment($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateDepartment($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}

