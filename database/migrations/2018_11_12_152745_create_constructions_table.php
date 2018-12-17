<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('street');
//            $table->string('area');
//            $table->string('material');
//            $table->string('price');
            $table->string('description');
            $table->integer('is_intermediary')->default('0');
            $table->integer('category_id');
            $table->integer('district_id')->nullable();
            $table->integer('city_id');
            $table->integer('type_id');
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
        Schema::dropIfExists('constructions');
    }
}
