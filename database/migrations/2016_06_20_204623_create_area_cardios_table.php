<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaCardiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_cardios', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );

			$table->string('pa');	
			$table->string('pa2'); 	
			$table->string('fcr');  	
			$table->string('fcr2');   
			$table->longText ( 'medicamentos');
			
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
        Schema::drop('area_cardios');
    }
}
