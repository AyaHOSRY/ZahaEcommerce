<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Product;
use App\Http\Detail;

class department extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id'); //$user= User::find($id); //$parent= $user->parent()->first(); // $children = $user->children()->get();
    }

    public function childrens()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }
    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function details()
    {
      return $this->hasMany(Detail::class);
    }
}
