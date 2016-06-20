<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeuroCoordenacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neuro_coordenacoes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_neuro_id', false, true );
			$table->foreign ( 'area_neuro_id' )->references ( 'id' )->on ( 'area_neuros' );
			 
			$table->string ( 'index_index');
			$table->string ( 'index_nariz_index');
			$table->string ( 'index_nariz');
			$table->string ( 'index_index_terapeuta');
			$table->string ( 'diadococinesia');
			$table->string ( 'grafia');
			$table->string ( 'calcanhar_joelho');
			$table->string ( 'batida_do_pe');
			$table->longText ( 'outros');
			
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
        Schema::drop('neuro_coordenacoes');
    }
}
