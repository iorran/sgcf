<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Agendamento extends Model {
	/**
	 * 
	 * O campo iniciada na tabela agendamentos aceita dois valores
	 * 0 - Não iniciada | 1 - Iniciada
	 * 
	 */ 
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'agendamentos';
	
	/**
	 * Retorna o aluno associado ao agendamento
	 *
	 * @var Agendamento
	 */
	public function aluno() {
		return $this->belongsTo( 'App\Models\Aluno');
	}
	
	/**
	 * Retorna o paciente associado ao agendamento
	 *
	 * @var Agendamento
	 */
	public function paciente() {
		return $this->belongsTo( 'App\Models\Paciente');
	}
}
