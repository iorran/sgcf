<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'anamneses';	
	
	/**
	 * Retorna o agendamento(consulta) associada a anamnese
	 *
	 * @var Agendamento
	 */
	public function agendamento() {
		return $this->belongsTo( 'App\Models\Agendamento');
	} 
}
