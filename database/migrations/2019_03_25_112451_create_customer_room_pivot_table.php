<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerRoomPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_room_pivot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')
                ->unsigned()
                ->nullable();
            $table->bigInteger('room_id')
                ->unsigned()
                ->nullable();
            $table->dateTime('date_move_in');
            $table->dateTime('date_move_out');

            $table->foreign('customer_id')
                ->references('id')->on('customers')
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
        Schema::dropIfExists('customer_room_pivot');
    }
}
