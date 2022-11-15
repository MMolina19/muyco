<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionProductsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('collection_product')) {
            Schema::create('collection_product', function (Blueprint $table) {
                $table->unsignedbigInteger('collection_id');
                $table->unsignedBigInteger('product_id');
                //$table->foreignId('collection_id')->constrained()->onDelete('cascade');
                //$table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->timestamps();
                $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('collection_product');
    }
}
