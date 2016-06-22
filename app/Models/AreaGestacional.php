<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaGestacional extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'area_gestacionals';

	/**
	 * Retorna o filho
	 *
	 * @var cardiovascular
	 */
	public function cardiovascular() {
		return $this->hasOne ( 'App\Models\GestacionalCardiovascular' );
	}
	
	/**
	 * Retorna o filho
	 *
	 * @var digestivo
	 */
	public function digestivo() {
		return $this->hasOne ( 'App\Models\GestacionalDigestivo' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var especial
	 */
	public function especial() {
		return $this->hasOne ( 'App\Models\GestacionalEspecial' );
	} 

	/**
	 * Retorna o filho
	 *
	 * @var fisico
	 */
	public function fisico() {
		return $this->hasOne ( 'App\Models\GestacionalFisico' );
	}
	
	/**
	 * Retorna o filho
	 *
	 * @var musculo
	 */
	public function musculo() {
		return $this->hasOne ( 'App\Models\GestacionalMusculo' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var musculo
	 */
	public function genito() {
		return $this->hasOne ( 'App\Models\GestacionalGenitourinario' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var musculo
	 */
	public function nervoso() {
		return $this->hasOne ( 'App\Models\GestacionalNervoso' );
	} 
	
	/**
	 * Retorna o filho
	 *
	 * @var musculo
	 */
	public function tegumentar() {
		return $this->hasOne ( 'App\Models\GestacionalTegumentar' );
	} 
}
