<?php
use Illuminate\Database\Seeder;
class PacienteSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() { 
		/*
		 * Cria varios pacientes usando a fabrica App/Database/factories/ModelFactory
		 */ 
		factory(App\Models\Endereco::class, 49)->create()->each(function($u) {
			$u->paciente()->save(factory(App\Models\Paciente::class)->make());
		});
	}
}
