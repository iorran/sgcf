<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardioAptidao extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'cardio_aptidaos';
	
	/**
	 * Retorna o pai
	 *
	 * @var manobras
	 */
	public function cardio() {
		return $this->belongsTo ( 'App\Models\AreaCardio' );
	}
}
