<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestacionalCardiovascular extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'gestacional_cardiovasculars';
	 
	/**
	 * Retorna o pai 
	 *
	 * @var gestacional
	 */
	public function gestacional() {
		return $this->belongsTo ( 'App\Models\AreaGestacional' );
	} 
}
