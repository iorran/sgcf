<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' ); 
			$table->longText ( 'diagnostico' );
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
        Schema::drop('diagnosticos');
    }
}
