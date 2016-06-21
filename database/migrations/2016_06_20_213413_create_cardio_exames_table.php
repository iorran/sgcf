<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCardioExamesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'cardio_exames', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_cardio_id', false, true );
			$table->foreign ( 'area_cardio_id' )->references ( 'id' )->on ( 'area_cardios' );

			$table->integer ( 'colesterol_total' );
			$table->integer ( 'hdl' );
			$table->integer ( 'ldl' );
			$table->integer ( 'triglicerideos' );
			$table->integer ( 'glicose' );
			$table->integer ( 'imc' );
			
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'cardio_exames' );
	}
}
