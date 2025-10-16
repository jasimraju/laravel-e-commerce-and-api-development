<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_counter_userwise extends Model
{
    use HasFactory;
     protected $table = "search_counters";
         protected $fillable = [
        'user_id',
        'deviceId',
        'count_number',
        'search_counter_id',
           ];
    public static function createSearchCounterUserwise($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateSearchCounterUserwise($requestData,$id){

        try{
            $customer=static::find($id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
}
