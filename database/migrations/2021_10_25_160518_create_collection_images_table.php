<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionImagesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('collection_image')) {
            Schema::create('collection_image', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('image_id');
                //$table->unsignedbigInteger('product_id');
                $table->unsignedbigInteger('collection_id');
                //$table->foreignId('collection_id')->constrained()->onDelete('cascade');
                //$table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
                //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('collection_image');
    }
}
