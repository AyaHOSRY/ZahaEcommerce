<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class , 'parent_id');
    }
}
