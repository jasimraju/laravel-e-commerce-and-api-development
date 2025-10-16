<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halal_info extends Model
{
    use HasFactory;
    protected $table = "halal_info";
       protected $fillable = [
        'authority',
        'title',
        'description',
        'status',
        
    ];
    public $file_object = 6;

    public static function createHalal($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateHalal($requestData,$user_id){

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
}
