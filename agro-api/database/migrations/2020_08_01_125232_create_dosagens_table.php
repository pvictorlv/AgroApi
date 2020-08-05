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
            $table->bigInteger('cultura_id')->unsigned();
            $table->bigInteger('praga_id')->unsigned();
            $table->bigInteger('produto_id')->unsigned();

            $table->foreign('cultura_id')
                ->references('id')
                ->on('culturas')
                ->onDelete('cascade');

            $table->foreign('praga_id')
                ->references('id')
                ->on('pragas')
                ->onDelete('cascade');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');

            $table->string('dosagem', 120);

            $table->unique(['cultura_id', 'praga_id', 'produto_id']);

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
