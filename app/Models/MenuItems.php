<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;
    protected $table = "menu_items";

        protected $fillable = [
        'menu_id',
        'title',
        'route',
        'model_name',
        'icon',
        'parent_id',
        'module_id',
        'language_file_name',
        'status',
        'order'    
            ];


   	public static function createMenuItems($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public static function updateMenuItems($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
        }
    }

     public function childmenu()
    {
        return $this->hasMany(MenuItems::class,'parent_id','id');
    }
    public function menutype(){
        return $this->belongsTo(Menu::class,'menu_id');
    }

}
