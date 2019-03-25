<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no');
            $table->text('detail');
            $table->string('price');
            $table->integer('status')->comment('0 = ว่าง, 1 = ไม่ว่าง');
            $table->bigInteger('room_type_id')
                ->unsigned()
                ->nullable();

            $table->foreign('room_type_id')
                ->references('id')->on('room_type')
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
        Schema::dropIfExists('rooms');
    }
}
