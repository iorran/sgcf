<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaCardio extends Model { 
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'area_cardios';
	 
	/**
	 * Retorna o filho
	 *
	 * @var exame
	 */
	public function exame() {
		return $this->hasOne ( 'App\Models\CardioExame' );
	} 
	 
	/**
	 * Retorna o filho
	 *
	 * @var fator
	 */
	public function fator() {
		return $this->hasOne ( 'App\Models\CardioFator' );
	} 
	 
	/**
	 * Retorna o filho
	 *
	 * @var fator
	 */
	public function sintoma() {
		return $this->hasOne ( 'App\Models\CardioSintoma' );
	}  
	 
	/**
	 * Retorna o filho
	 *
	 * @var aptidao
	 */
	public function aptidao() {
		return $this->hasOne ( 'App\Models\CardioAptidao' );
	} 
}
