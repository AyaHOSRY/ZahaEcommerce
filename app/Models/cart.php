<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class cart extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id' , 'sub_total' , 'shipping', 'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['count','price','discount','total']);
    }
}
