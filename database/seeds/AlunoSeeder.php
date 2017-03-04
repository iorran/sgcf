<?php
use Illuminate\Database\Seeder;
class AlunoSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {  
		/*
		 * Cria varios alunos usando a fabrica App/Database/factories/ModelFactory
		 */
		factory(App\Models\Usuario::class, 49)->create()->each(function($u) {
			$u->aluno()->save(factory(App\Models\Aluno::class)->make());
		});
	}
}
