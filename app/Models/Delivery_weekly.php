<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_weekly extends Model
{
    use HasFactory;
    
      public function weekly_slot(){
        return $this->belongsToMany(Delivery_slot::class, 'delivery_slot_delivery_weeklies', 'week_id', 'slot_id');
    }
}
