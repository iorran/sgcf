<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsuariosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'usuarios', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments ( 'id' );
			$table->string ( 'senha' );
			$table->string ( 'nome' );
			$table->string ( 'email' )->unique ();
			$table->string ( 'telefone' )->nullable ();
			$table->rememberToken ();
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
		Schema::drop ( 'usuarios' );
	}
}
