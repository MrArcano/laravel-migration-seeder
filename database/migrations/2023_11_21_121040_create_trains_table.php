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
            $table->string('Azienda',20);
            $table->string('Stazione di partenza',20);
            $table->string('Stazione di arrivo',20);
            $table->time('Orario di partenza');
            $table->time('Orario di arrivo');
            $table->string('Codice Treno',10);
            $table->unsignedTinyInteger('Numero Carrozze');
            $table->boolean('In orario')->default(true);
            $table->boolean('Cancellato')->default(false);
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
