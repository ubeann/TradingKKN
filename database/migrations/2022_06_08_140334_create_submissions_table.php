<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Anonim');
            $table->string('gender');
            $table->string('phone');
            $table->string('origin_district');
            $table->string('origin_village');
            $table->string('origin_city');
            $table->string('destination');
            $table->string('reason')->default('Tidak bisa disebutkan.');
            $table->string('username_line')->nullable();
            $table->string('username_telegram')->nullable();
            $table->string('status')->default('Open');
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
        Schema::dropIfExists('submissions');
    }
};
