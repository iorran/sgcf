<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pacientes';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
 		'nome',
		'naturalidade',
		'profissao',
		'nacionalidade',
		'nascimento',
		'ddd',
		'telefone'
	];
	
	/**
	 * Retorna o usuario associado ao aluno
	 *
	 * @var Aluno
	 */
	public function endereco() {
		return $this->belongsTo ( 'App\Models\Endereco' );
	}
}
