<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaNeuro extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'area_neuros'; 
	 
	/**
	 * Retorna o filho
	 *
	 * @var manobras
	 */
	public function manobras() {
		return $this->hasOne ( 'App\Models\NeuroManobrasDeficitarias' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var NeuroCoordenacao
	 */
	public function coordenacao() {
		return $this->hasOne ( 'App\Models\NeuroCoordenacao' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var exame
	 */
	public function exame() {
		return $this->hasOne ( 'App\Models\NeuroExameFisico' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var NeuroEquilibrio.php
	 */
	public function equilibrio() {
		return $this->hasOne ( 'App\Models\NeuroEquilibrio' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var NeuroReflexoSuperficial.php
	 */
	public function superficial() {
		return $this->hasOne ( 'App\Models\NeuroReflexoSuperficial' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var NeuroReflexoPostural.php
	 */
	public function postural() {
		return $this->hasOne ( 'App\Models\NeuroReflexoPostural' );
	} 
}
