<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('collections')) {
            Schema::create('collections', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->nullable()->default(null);
                $table->text('description')->nullable()->default(null);
                $table->float('amount')->nullable()->default(null);
                $table->text('cover')->nullable()->default(null);
                $table->text('cover_path')->nullable()->default(null);
                $table->text('cover_url')->nullable()->default(null);
                $table->unsignedInteger('active')->default(1);
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
        Schema::dropIfExists('collections');
    }
}
