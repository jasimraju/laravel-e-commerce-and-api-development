<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_info extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'description',
        'bg_color',
        'language_file_name',
        'fav_icon_status',
        'sec_status',
        'discount_type',
        'discount_amount',
        'more_details',
        'parent_id',
        'create_by',
        'update_by',
        'icon',
        'own_id',
        'status'   
            ];
    public $file_object = 2;

    public static function createCategory($requestData){
        
        try{            
            $save = static::create($requestData); 
            return $save;            
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateCategory($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
            }
    }
    public function categories()
    {
        return $this->hasMany(Category_info::class,'parent_id','id');
    }
    public function parent()
    {
        return $this->belongsTo(Category_info::class,'parent_id','id')->select('id','name');
    }
    public function image(){
        return $this->belongsToMany(Image::class, 'other_image', 'object_id', 'image_id')->where('other_image.object_type', '=', $this->file_object)->withPivot([ 'object_status']);
    }

    public function product(){
        return $this->hasMany(Product_info::class, 'category_info_id', 'id');
    }
}
