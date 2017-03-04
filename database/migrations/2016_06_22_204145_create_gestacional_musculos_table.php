<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestacionalMusculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacional_musculos', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );
			
			$table->string ( 'fratura' );
			$table->string ( 'parestesia' ); 
			$table->longText ( 'musculos_outros' );
			$table->string ( 'emocional' ); 
			$table->string ( 'hf' ); 
			
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
        Schema::drop('gestacional_musculos');
    }
}
