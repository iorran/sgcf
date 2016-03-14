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
			'senha' => bcrypt ( 1 ),
			'remember_token' => str_random ( 10 ) 
	];
} );
// Professor
$factory->define ( App\Models\Professor::class, function (Faker\Generator $faker) {
	return [ 
			'login' => str_replace('.', '_', $faker->unique()->userName),
	];
} );
	