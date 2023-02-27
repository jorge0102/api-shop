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
        Schema::create('box', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('type_id')->constrained('type');
            $table->foreignId('delivery_frequency_id')->constrained('delivery_frecuency');
            $table->foreignId('kg_id')->constrained('kg');
            $table->foreignId('fruits_excluded_id')->constrained('box_fruits_excluded');
            $table->foreignId('vegetables_excluded_id')->constrained('box_vegetables_excluded');
            $table->boolean('status');
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
        Schema::dropIfExists('box');
    }
};
