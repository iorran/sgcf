<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardioAptidaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardio_aptidaos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_cardio_id', false, true );
			$table->foreign ( 'area_cardio_id' )->references ( 'id' )->on ( 'area_cardios' );

			$table->longText ( 'teste_articular' );
			$table->longText ( 'teste_muscular' ); 
			$table->longText ( 'analise_da_marcha' ); 
			$table->longText ( 'analise_ventilatoria' ); 
			$table->string ( 'fr' ); 
			$table->string ( 'temp_auxiliar' ); 
			$table->string ( 'sao2' ); 
			$table->string ( 'ausculta_pulmonar' ); 
			$table->longText ( 'dor_toracica' );  
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
        Schema::drop('cardio_aptidaos');
    }
}
