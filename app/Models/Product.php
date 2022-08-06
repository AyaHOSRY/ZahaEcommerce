<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Occasion;
use App\Models\Department;
use App\Models\Review;
use App\Models\color;
use App\Models\wishlist;
use App\Models\Order;
use App\Models\Cart;


class Product extends Model
{
    use HasFactory;

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }
    
    public function colors()
      {
        return $this->belongsToMany(Color::class, 'product_color', 'product_id' , 'color_id');
      }

      public function sizes()
      {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id' , 'size_id');
      }

      public function wishlists()
    {
      return $this->hasMany(Wishlist::class);
    }
    public function orders()
      {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id' , 'order_id');
      }

      public function carts()
      {
        return $this->belongsToMany(Cart::class, 'cart_product', 'product_id' , 'cart_id');
      }
}
