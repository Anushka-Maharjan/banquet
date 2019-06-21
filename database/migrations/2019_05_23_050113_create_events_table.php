<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->text('customer_name');
            $table->text('contact');
            $table->text('address')->nullable();
            $table->text('expected_pax')->nullable();
            $table->bigInteger('advance')->nullable();
            $table->integer('banquet_id');
            $table->text('shift');
            $table->text('day');
            $table->date('expire_in')->nullable();
            $table->integer('hall');
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
        Schema::dropIfExists('events');
    }
}
