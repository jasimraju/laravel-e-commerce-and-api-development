<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_info extends Model
{
    use HasFactory;
    protected $table = "supplier_info";
       protected $fillable = [
        'business_user_id',
        'country_id',
        'supplier_name',
        'supplier_code',
        'supplier_details',
    ];

    public $file_object = 8;

    public static function createSupplierInfo($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateSupplierInfo($requestData,$user_id){

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

    public function varient(){
        return $this->hasMany(Varient_info::class, 'supplier_id', 'id');
    }

}
