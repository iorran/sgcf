<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeuroReflexoPostural extends Model
{ 
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'neuro_reflexo_posturals'; 
	 
	/**
	 * Retorna o pai 
	 *
	 * @var manobras
	 */
	public function neuro() {
		return $this->belongsTo ( 'App\Models\NeuroSensibilidade' );
	} 
}
