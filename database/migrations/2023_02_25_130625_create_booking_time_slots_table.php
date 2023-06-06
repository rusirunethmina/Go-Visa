<?php

use App\Models\BookingTimeSlot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_time_slots', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });

        // Add default values.
        $timeSlots = [
            ['start_time' => '07:00:00', 'end_time' => '07:30:00'],
            ['start_time' => '07:30:00', 'end_time' => '08:00:00'],
            ['start_time' => '08:00:00', 'end_time' => '08:30:00'],
            ['start_time' => '08:30:00', 'end_time' => '09:00:00'],
            ['start_time' => '09:00:00', 'end_time' => '09:30:00'],
            ['start_time' => '09:30:00', 'end_time' => '10:00:00'],
            ['start_time' => '10:00:00', 'end_time' => '10:30:00'],
            ['start_time' => '10:30:00', 'end_time' => '11:00:00'],
            ['start_time' => '11:00:00', 'end_time' => '11:30:00'],
            ['start_time' => '11:30:00', 'end_time' => '12:00:00'],
            ['start_time' => '12:00:00', 'end_time' => '12:30:00'],
            ['start_time' => '12:30:00', 'end_time' => '13:00:00'],
            ['start_time' => '13:00:00', 'end_time' => '13:30:00'],
            ['start_time' => '13:30:00', 'end_time' => '14:00:00'],
            ['start_time' => '14:00:00', 'end_time' => '14:30:00'],
            ['start_time' => '14:30:00', 'end_time' => '15:00:00'],
            ['start_time' => '15:00:00', 'end_time' => '15:30:00'],
            ['start_time' => '15:30:00', 'end_time' => '16:00:00'],
            ['start_time' => '16:00:00', 'end_time' => '16:30:00'],
            ['start_time' => '16:30:00', 'end_time' => '17:00:00'],
            ['start_time' => '17:00:00', 'end_time' => '17:30:00'],
            ['start_time' => '17:30:00', 'end_time' => '18:00:00'],
            ['start_time' => '18:00:00', 'end_time' => '18:30:00'],
            ['start_time' => '18:30:00', 'end_time' => '19:00:00'],
            ['start_time' => '19:00:00', 'end_time' => '19:30:00'],
            ['start_time' => '19:30:00', 'end_time' => '20:00:00'],
            ['start_time' => '20:00:00', 'end_time' => '20:30:00'],
            ['start_time' => '20:30:00', 'end_time' => '21:00:00'],
            ['start_time' => '21:00:00', 'end_time' => '21:30:00']
        ];

        BookingTimeSlot::insert($timeSlots);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_time_slots');
    }
}
