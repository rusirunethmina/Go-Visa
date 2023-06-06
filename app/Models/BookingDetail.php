<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingDetail extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the booking time slot associated with the booking detail.
     * @return BelongsTo
     */
    public function timeSlot(): BelongsTo
    {
        return $this->belongsTo(BookingTimeSlot::class, 'time_slot_id');
    }


    /**
     * Define a relationship between the booking_details table and users table
     * to get the user who booked the appointment.
     * @return BelongsTo
     */
    public function bookedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'booked_user_id');
    }


    /**
     * Define a relationship between the booking_details table and users table
     * to get the agent own for the appointment.
     * @return BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
