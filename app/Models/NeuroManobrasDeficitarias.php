<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeuroManobrasDeficitarias extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'neuro_manobras_deficitarias'; 
	 
	/**
	 * Retorna o pai 
	 *
	 * @var manobras
	 */
	public function neuro() {
		return $this->belongsTo ( 'App\Models\NeuroSensibilidade' );
	} 
}
