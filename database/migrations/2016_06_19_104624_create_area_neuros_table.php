<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaNeurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_neuros', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );
			
			$table->string('tatil');
			$table->string('termica');
			$table->string('dolorosa');
			$table->string('palestesia');
			$table->string('barestesia');
			$table->string('barognesia');
			$table->string('grafestesia');
			$table->string('propriecptiva');
			$table->string('descricao_de_marcha');
			$table->string('nervos_cranianos');
			$table->string('linguagem');
			$table->string('comportamento');
			$table->string('sincinesias');
			$table->string('gnosia');
			$table->string('praxia');
			$table->string('memoria_recente');
			$table->string('memoria_remota');
			
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
        Schema::drop('area_neuros');
    }
}
