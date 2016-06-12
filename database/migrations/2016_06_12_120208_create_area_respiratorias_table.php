<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAreaRespiratoriasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'area_respiratorias', function (Blueprint $table) {
			$table->increments ( 'id' );

			$table->integer ( 'paciente_id', false, true );
			$table->foreign ( 'paciente_id' )->references ( 'id' )->on ( 'pacientes' );
			$table->integer ( 'agendamento_id', false, true );
			$table->foreign ( 'agendamento_id' )->references ( 'id' )->on ( 'agendamentos' );
			 
			$table->string ( 'analise_postural' );
			$table->string ( 'avds' );
			$table->string ( 'linha_axilar' );
			$table->string ( 'ap_xifoide' );
			$table->string ( 'ultimas_costelas' );
			$table->string ( 'cicatriz_umbilical' );
			$table->longText ( 'ex_complementares' );
			
			$table->string ( 'manovacuamento' );
			$table->string ( 'ventilometro' );
			$table->string ( 'peak_flow' );
			$table->string ( 'palpitacao' );
			$table->string ( 'diafragma' );
			$table->string ( 'abdominais' );
			$table->string ( 'ecom' );
			$table->string ( 'trapezio' );
			$table->string ( 'vertebrais' );
			$table->string ( 'peitoral' );
			$table->string ( 'intercostais' );
			$table->string ( 'ritmo' );
			$table->string ( 'tipo' );
			$table->string ( 'amplitude' );
			$table->string ( 'musculatura' );
			$table->string ( 'tosse' );
			$table->string ( 'percussao' );
			$table->string ( 'ausculta' );
			$table->integer ( 'fc' );
			$table->string ( 'fr' );
			$table->integer ( 't' );
			$table->integer ( 'spo2' );
			$table->integer ( 'imc' );
			$table->string ( 'inspecao' ); 
			
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'area_respiratorias' );
	}
}
