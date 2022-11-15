<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('null');
            //$table->string('url')->default('null');
            $table->string('slug')->default('null');
            $table->string('navigation')->default('null');
            $table->string('route')->default('null');
            $table->unsignedInteger('active')->default(1);
            $table->string('image_type')->default('null');
            $table->string('image_src')->default('null');
            $table->string('image_class')->default('null');
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
        Schema::dropIfExists('navbar');
    }
}
