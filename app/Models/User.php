<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
use App\Models\Review;
use App\Models\Address;
use App\Models\Order;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fullname', 'username', 'phone', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }

    public function wishlists()
    {
      return $this->hasMany(Wishlist::class);
    }

    public function addresses()
    {
      return $this->hasMany(Address::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function carts()
    {
      return $this->hasMany(Cart::class);
    }
}
