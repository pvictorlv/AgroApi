<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosagens', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('cultura_id')->unsigned();
            $table->integer('praga_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->string('quantidade', 120);
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
        Schema::dropIfExists('dosagens');
    }
}
