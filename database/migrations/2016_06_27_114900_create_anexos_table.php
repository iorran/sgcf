<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );

			$table->string ( 'arquivo_old' );
			$table->string ( 'caminho' );
			
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
        Schema::drop('anexos');
    }
}
