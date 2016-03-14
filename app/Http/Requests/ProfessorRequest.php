<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Professor;

class ProfessorRequest extends Request {
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
			$professor = Professor::findOrFail ( $this->segment ( 3 ) );
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
							'login' => 'required|unique:professores',
							'email' => 'required|email|unique:usuarios',
							'senha' => 'required|confirmed',
					];
				}
			case 'PUT' :
			case 'PATCH' :
				{
					return [ 
							'nome' => 'required',
							'login' => 'required|unique:professores,id,' . $professor->id,
							'email' => 'required|email|unique:usuarios,id,' . $professor->usuario->id 
					];
				}
			default :
				break;
		}
	}
}
