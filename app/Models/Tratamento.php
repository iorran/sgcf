<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tratamento extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'tratamentos';	
	
	/**
	 * Retorna o agendamento(consulta) associada ao tratamento
	 *
	 * @var Agendamento
	 */
	public function agendamento() {
		return $this->belongsTo( 'App\Models\Agendamento');
	} 
}
