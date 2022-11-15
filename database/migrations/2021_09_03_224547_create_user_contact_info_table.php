<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserContactInfoTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_contact_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //associate the address with a user
            $table->string('phone')->unique()->nullable()->default(null);
            //$table->timestamp('phone_verified_at')->nullable();
            $table->string('mobile')->unique()->nullable()->default(null);
            $table->timestamp('mobile_verified_at')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('user_contact_info');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
