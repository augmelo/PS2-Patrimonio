<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatrimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonies', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->foreignId('component_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->string('ip');
            $table->foreignId('place_id')->constrained();
            $table->foreignId('sector_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('note')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('patrimonies');
    }
}
