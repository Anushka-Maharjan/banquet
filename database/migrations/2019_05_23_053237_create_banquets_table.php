<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanquetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banquets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('name');
            $table->text('contact')->nullable();
            $table->text('address')->nullable();
            $table->text('username')->nullable();
            $table->integer('hall')->nullable();
            $table->text('menu')->nullable();
            $table->text('pricing')->nullable();
            $table->integer('bike')->nullable();
            $table->integer('car')->nullable();
            $table->text('banner')->nullable();
            $table->mediumText('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banquets');
    }
}
