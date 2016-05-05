<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'enderecos';
	
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
		'logradouro',
		'numero',
		'bairro',
		'cep',
		'cidade',
		'estado'
	]; 
	
	/**
	 * Retorna o paciente associado ao endereco
	 *
	 * @var Paciente
	 */
	public function paciente() {
		return $this->hasOne ( 'App\Models\Paciente' )->withTrashed();
	} 
}
