<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateGestacionalGenitourinariosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'gestacional_genitourinarios', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );
			
			$table->string ( 'infeccao' );
			$table->string ( 'perda' );
			$table->string ( 'disuria' );
			$table->string ( 'sensacao' );
			$table->string ( 'pelvica' );
			$table->string ( 'abdominal' );
			$table->string ( 'vaginal' );
			$table->string ( 'costa' );
			$table->longText ( 'genito_obs' );
			
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'gestacional_genitourinarios' );
	}
}
