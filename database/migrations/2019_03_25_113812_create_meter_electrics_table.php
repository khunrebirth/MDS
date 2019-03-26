<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterElectricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_electrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('account_id')
                ->unsigned()
                ->nullable();
            $table->bigInteger('room_id')
                ->unsigned()
                ->nullable();
            $table->integer('unit');
            $table->integer('unit_current');
            $table->integer('total');

            $table->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('cascade');

            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');

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
        Schema::dropIfExists('meter_electrics');
    }
}
