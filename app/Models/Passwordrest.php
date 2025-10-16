<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwordrest extends Model
{
    use HasFactory;
    protected $table = "password_resets";

     protected $fillable = [
        'email',
        'token',
        'email_opt',
        'start_date_time',
        'end_date_time',
                    ];


    	public static function createPasswordrest($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updatePasswordrest($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }


}
