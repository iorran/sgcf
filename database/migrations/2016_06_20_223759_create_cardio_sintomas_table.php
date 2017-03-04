<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardioSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardio_sintomas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_cardio_id', false, true );
			$table->foreign ( 'area_cardio_id' )->references ( 'id' )->on ( 'area_cardios' );

			$table->string ( 'p1' );
			$table->string ( 'p2' ); 
			$table->string ( 'p3' ); 
			$table->string ( 'p4' ); 
			$table->string ( 'p5' ); 
			$table->string ( 'p6' ); 
			$table->string ( 'p7' ); 
			$table->string ( 'p8' ); 
			$table->string ( 'p9' ); 
			$table->string ( 'tipo_risco' ); 
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
        Schema::drop('cardio_sintomas');
    }
}
