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
        Schema::create('box_vegetables_excluded', function (Blueprint $table) {
            $table->foreignId('box_id')->constrained('box');
            $table->foreignId('vegetables_excluded_id')->constrained('vegetables_excluded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_vegetables_excluded');
    }
};
