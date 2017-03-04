<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestacionalTegumentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacional_tegumentars', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );
			
			$table->string ( 'alergia' );
			$table->string ( 'pele' );   
			$table->longText( 'tegumentar_obs' );  
			
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
        Schema::drop('gestacional_tegumentars');
    }
}
