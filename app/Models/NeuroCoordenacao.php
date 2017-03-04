<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeuroCoordenacao extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'neuro_coordenacoes'; 
	 
	/**
	 * Retorna o pai das manobras
	 *
	 * @var manobras
	 */
	public function neuro() {
		return $this->belongsTo ( 'App\Models\AreaNeuro' );
	} 
}
