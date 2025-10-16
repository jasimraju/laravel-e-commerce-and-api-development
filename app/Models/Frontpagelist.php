<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontpagelist extends Model
{
    use HasFactory;
    protected $table = "frontpagelists";

     public function slider(){
            return $this->hasMany(Silder_and_other_banner::class,'type','id');
        }
}
