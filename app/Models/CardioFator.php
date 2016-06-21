<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardioFator extends Model {
	/**
	 *	Para quaisquer propiedades dessa classe é utilizado
	 *
	 *	0 - Não | 1 - Sim
	 */
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'cardio_fators';
	
	/**
	 * Retorna o pai
	 *
	 * @var cardio
	 */
	public function cardio() {
		return $this->belongsTo ( 'App\Models\AreaCardio' );
	}
}
