<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAnamnesesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'anamneses', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments ( 'id' );
			$table->string ( 'QP' );
			$table->string ( 'HDA' );
			$table->string ( 'HPP' );
			$table->string ( 'HS' );
			$table->string ( 'HFAM' );
			$table->string ( 'AVDS' );
			$table->longText ( 'medicamentos' );
			$table->longText ( 'ex_complementares' );
			$table->string ( 'area_funcional', 1);
			
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'anamneses' );
	}
}
