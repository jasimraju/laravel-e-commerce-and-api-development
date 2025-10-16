<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varient_info extends Model
{
    use HasFactory;
    protected $table = "varient_info";
    protected $fillable = [
        'unit_of_quantity',
        'weight',
        'packet_size',
        'packet_size_unit_id',
        'carton_pack_size',
        'product_info_id',
        'color',
        'size',
        'gp_percentage',
        'product_sku',
        'product_price_id',
        'varient_name',
        'rsp_w_gst',
        'per_serving_measure',
        'per_serving_measure_unit',    
        'supplier_id',    
            ];

        public $file_object = 9;
        public $discount_object = 1;

    public static function createVarient($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateVarient($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }

      public function image(){
        return $this->belongsToMany(Image::class, 'other_image', 'object_id', 'image_id')->where('other_image.object_type', '=', $this->file_object)->withPivot([ 'object_status']);
    }
      public function supplier(){
         return $this->belongsTo(Supplier_info::class,'supplier_id');
    }
       public function product(){
         return $this->belongsTo(Product_info::class,'product_info_id');
    }

     public function discount(){
        return $this->belongsToMany(Weekly_deal::class, 'weekly_details', 'object_id', 'weekly_id')->where('weekly_details.type', '=', $this->discount_object);
    }

}
