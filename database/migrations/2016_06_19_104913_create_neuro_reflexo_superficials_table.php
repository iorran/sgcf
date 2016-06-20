<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeuroReflexoSuperficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neuro_reflexo_superficials', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_neuro_id', false, true );
			$table->foreign ( 'area_neuro_id' )->references ( 'id' )->on ( 'area_neuros' );
			 
			$table->string ( 'babinski');
			$table->string ( 'gordon');
			$table->string ( 'warterbenrg');
			$table->string ( 'oppenhein');
			$table->string ( 'rossolino');
			$table->string ( 'cutaneo_abdominal');
			$table->string ( 'chacddock');
			$table->string ( 'hoffman');
			$table->longText ( 'outro');
			$table->string ( 'mandibular');
			$table->string ( 'aquileu');
			$table->string ( 'patelar');
			
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
        Schema::drop('neuro_reflexo_superficials');
    }
}
