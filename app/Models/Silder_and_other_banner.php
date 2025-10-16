<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Silder_and_other_banner extends Model
{
    use HasFactory;
     protected $table = "silder_and_other_banners";
    protected $fillable = [
        'title',
        'description',
        'bg_color',
        'tag_line',
        'type',
        'update_by',
        'create_by'
            ];
    public $file_object = 5;

    public static function createBanner($requestData){
        
        try{            
            $save = static::create($requestData); 
            return $save;            
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateBanner($requestData,$user_id){

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

    public function sliderbutton()
{
  return $this->hasMany(Sliderbuttonlist::class,'slider_id', 'id');
}
}
