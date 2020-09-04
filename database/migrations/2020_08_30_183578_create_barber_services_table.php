<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barber_services', function (Blueprint $table) {
            $table->unsignedBigInteger('barber_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();


            $table->foreign('barber_id')->references('id')->on('barbers')
            ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('service_id')->references('id')->on('services')
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
        Schema::dropIfExists('barber_services');
    }
}
