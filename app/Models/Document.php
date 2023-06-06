<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Document extends Model
{

    protected $fillable = [
        'user_id',
        'url',
        'rejection_reason',
        'status',
    ];

    /**
     * many to one
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
