<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaGestacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_gestacionals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );

			$table->string('dum');	
			$table->string('dpp'); 	  
			$table->longText ( 'objetivo');

			$table->string('planejamento');
			$table->string('tto');
			$table->string('hasg');
			$table->string('dmg');			
			$table->string('eclampsia');
			$table->string('parto');
			$table->string('ruptura');
			$table->string('placenta');
			$table->string('incompetencia');
			$table->string('recem');
			 
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
        Schema::drop('area_gestacionals');
    }
}
