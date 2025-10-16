<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;
     protected $table = "orderdetails";
    protected $fillable = [
        'varient_id',
        'product_id',
        'supplier_id',
        'payment_id',
        'order_id',
        'return_id',
        'stock_load_id',
        'delivery_id',
        'price',
        'other',
        'discount',
        'is_seen_by_supplier',
        'qty',
        
        
    ];


    public static function createOrderdetails($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateOrderdetails($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }

        public function product(){
         return $this->belongsTo(Product_info::class,'product_id');
    }   
    public function varient(){
         return $this->belongsTo(Varient_info::class,'varient_id');
    } 
    public function supplier(){
         return $this->belongsTo(Supplier_info::class,'supplier_id');
    }
    
}
