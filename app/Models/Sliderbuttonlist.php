<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliderbuttonlist extends Model
{
    use HasFactory;
      protected $table = "sliderbuttonlists";
       protected $fillable = [
        'title',
        'language_file_name',
        'bg_color',
        'slider_id',
        'frontpage_id',
        'update_by',
        'create_by'
            ];

        public static function createBannerButton($requestData){
        
        try{            
            $save = static::create($requestData); 
            return $save;            
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateBannerButton($requestData,$id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
            }
    }
        public function link()
{
  return $this->hasOne(Frontpagelist::class,'id', 'frontpage_id');
}
}
