<?php
use Illuminate\Database\Seeder;
class ProfessorSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$usuarios = [ 
				0 => [ 
						'senha' => Crypt::encrypt ( 1 ),
						'nome' => 'Professor Padrão',
						'email' => 'admin@sgcf.com' 
				] 
		];
		DB::table ( 'usuarios' )->insert ( $usuarios );
		
		$professores = [ 
				0 => [ 
						'login' => 'admin',
						'usuario_id' => 1 
				] 
		];
		DB::table ( 'professores' )->insert ( $professores );
		
		/*
		 * Cria varios professores usando a fabrica App/Database/factories/ModelFactory
		 */
		factory(App\Models\Usuario::class, 49)->create()->each(function($u) {
			$u->professor()->save(factory(App\Models\Professor::class)->make());
		});
	}
}
