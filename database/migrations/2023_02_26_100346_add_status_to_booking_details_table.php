<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_details', function (Blueprint $table) {
            $table->enum('status', ['confirmed' ,'cancelled', 'pending'])->default('pending')->after('booked_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('booking_details', 'status')) {
            Schema::table('booking_details', function (Blueprint $table) {
                $table->dropColumn(['status']);
            });
        }
    }
}
