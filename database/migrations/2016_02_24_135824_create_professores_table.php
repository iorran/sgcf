<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProfessoresTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'professores', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments ( 'id' );
			$table->string ( 'login' )->unique ();
			$table->string ( 'crefito' )->nullable();
			$table->integer ( 'usuario_id', false, true );
			$table->foreign ( 'usuario_id' )->references ( 'id' )->on ( 'usuarios' );
			$table->timestamps ();
			$table->SoftDeletes ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'professores' );
	}
}
