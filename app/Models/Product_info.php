<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_info extends Model
{
    use HasFactory;
    protected $table = "product_infos";
       protected $fillable = [
        'product_name',
        'product_number',
        'unit_id',
        'unit_qty',
        'online_display_name',
        'online_key_information',
        'category_info_id',
        'item_gross_weight',
        'item_weight_unit_id',
        'item_length',
        'item_width',
        'item_height',
        'ingrdients',
        'storage',
        'nutrition_fact',
        'preparation',
        'per_serving_measure',
        'per_serving_measure_unit',
        'no_expiry_data_rquired',
        'period_indicatore_of_self_life',
        'odd_shape_article',
        'hala',
        'organic',
        'healthier_choice',
        'healther_drink',
        'dept_id',
        'halal_info_details_id',
        'band_info_id',
        'supplier_info_id',
        'food_info_details_id',
        'country_id',
        'create_by',
        'update_by',
        'owner_id',
        'status',
        'p_discount'.
        'p_discount_type'
    ];

    public $file_object = 3;
    public $discount_object = 2;

    public static function createProduct($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateProduct($requestData,$user_id){

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

    public function category(){
         return $this->belongsTo(Category_info::class,'category_info_id');
    }

    public function varient(){
            return $this->hasMany(Varient_info::class,'product_info_id','id');
        }
    public function unit(){
         return $this->belongsTo(Unit_info::class,'unit_id');
    }
     public function country(){
         return $this->belongsTo(Country_info::class,'country_id');
    }
     public function brand(){
         return $this->belongsTo(Band_info::class,'band_info_id');
    }


    public function halal(){
        return $this->belongsToMany(Halal_info::class, 'hala_details', 'product_info_id', 'hala_info_id')->withPivot(['halal_exipirydate']);
    }

     public function discount(){
        return $this->belongsToMany(Weekly_deal::class, 'weekly_details', 'object_id', 'weekly_id')->where('weekly_details.type', '=', $this->discount_object);
    }
   
   
}
