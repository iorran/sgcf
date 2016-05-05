<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pacientes';
	
	use SoftDeletes;
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
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
		return $this->belongsTo ( 'App\Models\Endereco' )->withTrashed();
	}
}
