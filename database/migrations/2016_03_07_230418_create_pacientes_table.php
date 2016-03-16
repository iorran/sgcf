<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePacientesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'pacientes', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments ( 'id' );
			$table->string ( 'nome' );
			$table->string ( 'naturalidade' )->nullable();
			$table->string ( 'profissao' )->nullable();
			$table->string ( 'nacionalidade' )->nullable();
			$table->date ( 'nascimento' )->nullable(); 
			$table->string('telefone')->nullable(); 
			$table->integer ( 'endereco_id', false, true );
			$table->foreign ( 'endereco_id' )->references ( 'id' )->on ( 'enderecos' );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'pacientes' );
	}
}
