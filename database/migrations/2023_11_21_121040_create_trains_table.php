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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('slug',130)->unique();
            $table->string('company',20);
            $table->string('departure_station',50);
            $table->string('arrival_station',50);
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('train_code',10);
            $table->unsignedTinyInteger('number_carriages');
            $table->boolean('in_time')->default(true);
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('trains');
    }
};
