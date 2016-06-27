<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestacionalDigestivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacional_digestivos', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );
			
			$table->string ( 'constipacao' );
			$table->string ( 'alteracao' );
			$table->string ( 'esforco' );
			$table->string ( 'manobra' );
			$table->string ( 'digestivo_sensacao' );
			$table->string ( 'fecais' );
			$table->string ( 'flatos' ); 
			$table->longText ( 'digestivo_obs' );
			
			$table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gestacional_digestivos');
    }
}
