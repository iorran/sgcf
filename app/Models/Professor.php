<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'professores';
	
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
			'login',
			'usuario_id' 
	];
	
	/**
	 * Retorna o usuario associado ao aluno
	 *
	 * @var Aluno
	 */
	public function usuario() {
		return $this->belongsTo( 'App\Models\Usuario')->withTrashed();
	}
}
