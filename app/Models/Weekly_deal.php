<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly_deal extends Model
{
    use HasFactory;
    public $discount_product = 2; 
    public $discount_varient = 1; 
    public $discount_category = 3; 
    public $discount_band = 4; 

      public function product(){
        return $this->belongsToMany(Product_info::class, 'weekly_details', 'weekly_id', 'object_id')->where('weekly_details.type', '=', $this->discount_product);
    		}

       public function variant(){
        return $this->belongsToMany(Varient_info::class, 'weekly_details', 'weekly_id', 'object_id')->where('weekly_details.type', '=', $this->discount_varient);
    	}

         public function category(){
        return $this->belongsToMany(Category_info::class, 'weekly_details', 'weekly_id', 'object_id')->where('weekly_details.type', '=', $this->discount_category);
    		}

         public function band(){
        return $this->belongsToMany(Band_info::class, 'weekly_details', 'weekly_id', 'object_id')->where('weekly_details.type', '=', $this->discount_band);
    		}
}
