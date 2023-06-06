<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'avatar',
        'bio',
        'phone',
        'tagline',
        'years_in_business',
        'locations',
        'languages',
        'why_should_you_hire_me',
        'position',
        'company',
        'location_id',
        'sub_bio',
        'hire_thumbnail'
    ];

    /**
     * many to one
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
