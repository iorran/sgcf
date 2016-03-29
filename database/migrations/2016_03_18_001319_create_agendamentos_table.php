<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAgendamentosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'agendamentos', function (Blueprint $table) { 
			$table->engine = 'InnoDB';
			$table->increments ( 'id' );
			$table->string ( 'events_start');
			$table->string ( 'events_end'); 
			$table->integer ( 'usuario_id', false, true );
			$table->foreign ( 'usuario_id' )->references ( 'id' )->on ( 'usuarios' );
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'agendamentos' );
	}
}
