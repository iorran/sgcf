<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeuroManobrasDeficitariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neuro_manobras_deficitarias', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_neuro_id', false, true );
			$table->foreign ( 'area_neuro_id' )->references ( 'id' )->on ( 'area_neuros' );

			$table->string('bracos_estend');
			$table->string('barre');
			$table->string('mingazzini'); 
			
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
        Schema::drop('neuro_manobras_deficitarias');
    }
}
