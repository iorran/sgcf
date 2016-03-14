<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'professores';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
			'login',
			'usuario_id' 
	];
	
	/**
	 * Retorna o usuario associado ao aluno
	 *
	 * @var Aluno
	 */
	public function usuario() {
		return $this->belongsTo( 'App\Models\Usuario');
	}
}
