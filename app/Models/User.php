<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_featured',
        'role',
        'category',
        'status',
        'slug'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * one to one.
     *
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id')->withDefault();
    }


    /**
     * Get all of the documents.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'user_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'provider_id');
    }

    public function review_positve()
    {
        return $this->reviews()->where('star', '>', '3')->count();
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id');
    }

    public function featured_testimonials()
    {
        return $this->testimonials()->where('is_featured', 1);
    }
}
