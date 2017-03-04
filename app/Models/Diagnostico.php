<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'diagnosticos';	
	
	/**
	 * Retorna o agendamento(consulta) associada ao diagnostico
	 *
	 * @var Agendamento
	 */
	public function agendamento() {
		return $this->belongsTo( 'App\Models\Agendamento');
	} 
}
