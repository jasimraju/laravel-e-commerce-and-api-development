<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'phone',
        'dob',
        'email',
        'password',
        'fd_id',
        'gmail_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public static function createuser($requestData){
        
        try{
            
            $save = static::create($requestData); 
            return $save;            
        }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);               
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
      public static function updateUser($requestData,$user_id){

        try{
            $customer=static::find($user_id);
            $customer->fill($requestData)->save();
                }catch(\Exception $e){   
            throw new \Exception($e->getMessage(), 1);           
            }
    }

      public function country(){
         return $this->belongsTo(Country_info::class,'country_id');
    }
    public function orderlist(){
            return $this->hasMany(Order::class,'user_id','id');
        }

     public function shoppingcard(){
            return $this->hasMany(Shopingcart::class,'user_id','id');
        }
    public function userconnected(){
            return $this->hasMany(UserConnection::class,'user_id','id');
        }
    public function userdevice(){
            return $this->hasMany(userdevice::class,'user_id','id');
        }
    public function address(){
            return $this->hasMany(Address_info::class,'rel_id','id')->where('Address_info.type', '=', 1);

        }
      public function card(){
            return $this->hasMany(Cardinfo::class,'user_id','id');
  
        }
        public function deliveryinfo(){
            return $this->hasMany(Delivryinfo::class,'user_id','id');
  
        }

}
