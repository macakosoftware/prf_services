<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceiro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financeiro', function (Blueprint $table) {
            $table->id();
            $table->date('dt_movimento');
            $table->date('dt_referencia');
            $table->string('ds_titulo');
            $table->text('ds_comentario');
            $table->decimal('vl_movimento', 10, 2);
            $table->tinyInteger('tp_movimento');
            $table->integer('cd_forma_pagto');            
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
        Schema::dropIfExists('financeiro');
    }
}
