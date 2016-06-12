<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAreaTraumatosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'area_traumatos', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );
			
			$table->string ( 'analise_muscular' );
			$table->string ( 'analise_articular' );
			$table->string ( 'perimetria' );
			$table->string ( 'imobilizacao' );
			$table->string ( 'analise_de_edema' );
			$table->string ( 'analise_de_dor' );
			$table->string ( 'analise_de_cicatriz' );
			$table->string ( 'analise_de_crepitacao' );
			$table->string ( 'analise_de_marcha' );
			$table->longText ( 'testes_especificos' );
			$table->longText ( 'ex_complementares' );
			$table->longText ( 'objetivos_do_tratamento' );
			$table->longText ( 'conduta_fisioterapeutica' );
			
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'area_traumatos' );
	}
}
