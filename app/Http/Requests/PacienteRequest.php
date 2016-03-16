<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Paciente;

class PacienteRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		if ($this->segment ( 3 ) != "") {
			$paciente = Paciente::findOrFail ( $this->segment ( 3 ) );
		}
		switch ($this->method ()) {
			case 'GET' :
			case 'DELETE' :
				{
					return [ ];
				}
			case 'POST' :
				{ 
					return [
							'nome' => 'required',
							'telefone' => 'between:10,11',
							'nascimento'        => 'date_format:Y-m-d',
							'cep' => 'size:8',
					];
				}
			case 'PUT' :
			case 'PATCH' :
				{
					return [ 
							'nome' => 'required', 
							'telefone' => 'between:10,11',
							'nascimento'        => 'date_format:Y-m-d',
							'cep' => 'size:8',
					];
				}
			default :
				break;
		}
	}
}
