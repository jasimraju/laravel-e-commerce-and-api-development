<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivryinfo extends Model
{
    use HasFactory;
    protected $table = "delivryinfos";
        protected $fillable = [
        'order_id',
        'address_id',
        'user_id',
        'date_time',
        'delivery_slot_delivery_week_id',
        'delivery_man_id',
        'delivery_status',
        'delivery_note',    
        'time_slort',    
        
    ];


    public static function createDelivryinfo($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateDelivryinfo($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }
    
       public function deliverystatus(){
        return $this->belongsTo(Delivery_status::class,'delivery_status');
    }
    
        public function timeslot(){
        return $this->belongsTo(Delivery_slot::class,'time_slort');
    }
}