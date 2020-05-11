<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spots_id');
            $table->char('fullname', 150);
            $table->char('email', 50);
            $table->char('mobile', 50);
            $table->text('address');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('spots_id')->references('id')->on('book_spots');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
