<?php

/*
 * |--------------------------------------------------------------------------
 * | Model Factories
 * |--------------------------------------------------------------------------
 * |
 * | Here you may define all of your model factories. Model factories give
 * | you a convenient way to create models for testing and seeding your
 * | database. Just tell the factory how a default model should look.
 * |
 */
// Usuario
$factory->define ( App\Models\Usuario::class, function (Faker\Generator $faker) {
	return [ 
		'nome' => $faker->name,
		'email' => $faker->email,
		'senha' => Crypt::encrypt (  1 ),
		'remember_token' => str_random ( 10 ) 
	];
} );
// Aluno
$factory->define ( App\Models\Aluno::class, function (Faker\Generator $faker) { 
	return [ 
		'matricula' =>mt_rand(1,mt_getrandmax())
	];
} );
// Professor
$factory->define ( App\Models\Professor::class, function (Faker\Generator $faker) {
	return [ 
		'login' => str_replace('.', '_', $faker->unique()->userName),
	];
} );
//Endereco 
$factory->define ( App\Models\Endereco::class, function (Faker\Generator $faker) {
	return [
		'logradouro' => $faker->address,
		'cidade' => $faker->city,
		'cep' => $faker->countryCode,
		'estado' => $faker->country, 
	];
} ); 
//Paciente
$factory->define ( App\Models\Paciente::class, function (Faker\Generator $faker) {
	return [
		'nome' => 'Paciente '.$faker->firstName,
	];
} );
