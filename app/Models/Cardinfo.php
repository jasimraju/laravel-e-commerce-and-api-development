<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardinfo extends Model
{
    use HasFactory;
    protected $table = "cardinfos";
        protected $fillable = [
        'card_number',
        'card_holder_name',
        'expiration_date',
        'cvv',
        'user_id',
        'status',
        'type',
        'other'
    ];
    
    public static function createCardinfo($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateCardinfo($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
           return $user_id; 
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
