<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan_Items;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'slug',
        'stripe_plan',
        'price',
        'currency',
        'description',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Plan_Items','plans_id','id');
    }
}
