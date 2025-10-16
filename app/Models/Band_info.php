<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band_info extends Model
{
    use HasFactory;
    protected $table = "band_info";
      protected $fillable = [
        'name',
        'brand_company_name',
        'brand_log',
        'brand_description',
    ];
    public $file_object = 7;

    public static function createBand($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateBand($requestData,$user_id){

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
     public function product(){
        return $this->hasMany(Product_info::class, 'band_info_id', 'id');
    }
}
