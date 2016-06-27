<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'anexos';
	
	/**
	 * Retorna o paciente
	 *
	 * @var Agendamento
	 */
	public function paciente() {
		return $this->belongsTo ( 'App\Models\Paciente' );
	}
}
