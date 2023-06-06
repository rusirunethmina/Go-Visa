<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessDataToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('years_in_business')->nullable()->comment('business')->after('phone');
            $table->string('locations')->nullable()->comment('business')->after('phone');
            $table->json('languages')->nullable()->comment('business')->after('phone');
            $table->string('why_should_you_hire_me')->nullable()->comment('business')->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['years_in_business']);
            $table->dropColumn(['locations']);
            $table->dropColumn(['languages']);
            $table->dropColumn(['why_should_you_hire_me']);
        });

    }
}
