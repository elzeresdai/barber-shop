<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barber_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('start_time');
            $table->timestamps();

            $table->foreign('barber_id')->references('id')->on('barbers')
                ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('service_id')->references('id')->on('services')
                ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
