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
        Schema::create('sdgs', function (Blueprint $table) {
            $table->id();
            $table->string('sdgs_1', 16)->nullable();
            $table->string('sdgs_2', 16)->nullable();
            $table->string('sdgs_3', 16)->nullable();
            $table->string('sdgs_4', 16)->nullable();
            $table->string('sdgs_5', 16)->nullable();
            $table->string('sdgs_6', 16)->nullable();
            $table->string('sdgs_7', 16)->nullable();
            $table->string('sdgs_8', 16)->nullable();
            $table->string('sdgs_9', 16)->nullable();
            $table->string('sdgs_10', 16)->nullable();
            $table->string('sdgs_11', 16)->nullable();
            $table->string('sdgs_12', 16)->nullable();
            $table->string('sdgs_13', 16)->nullable();
            $table->string('sdgs_14', 16)->nullable();
            $table->string('sdgs_15', 16)->nullable();
            $table->string('sdgs_16', 16)->nullable();
            $table->string('sdgs_17', 16)->nullable();
            $table->string('sdgs_18', 16)->nullable();
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
        Schema::dropIfExists('sdgs');
    }
};
