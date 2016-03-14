<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
			'senha',
			'nome',
			'email' 
	];
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 
			'senha',
			'remember_token' 
	];
	
	/**
	 * Retorna o aluno associado ao usuario
	 *
	 * @var Aluno
	 */
	public function aluno() {
		return $this->hasOne( 'App\Models\Aluno');
	}
	
	/**
	 * Retorna o professor associado ao usuario
	 *
	 * @var Professor
	 */
	public function professor() {
		return $this->hasOne( 'App\Models\Professor');
	}
}
