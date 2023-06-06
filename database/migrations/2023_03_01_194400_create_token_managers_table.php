<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  
            $table->string('name');
            $table->string('access_token');
            $table->string('refresh_token')->nullable();
            $table->string('expires_in')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_managers');
    }
}
