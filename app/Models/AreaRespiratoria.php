<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaRespiratoria extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'area_respiratorias';	
	
	/**
	 * Retorna o agendamento(consulta) associada a area_respiratoria
	 *
	 * @var Agendamento
	 */
	public function agendamento() {
		return $this->belongsTo( 'App\Models\Agendamento');
	} 
}
