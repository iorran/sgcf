<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Aluno;

class AlunoRequest extends Request {
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
			$aluno = Aluno::findOrFail ( $this->segment ( 3 ) );
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
							'matricula' => 'required|string|size:12|unique:alunos',
							'email' => 'required|email|unique:usuarios',
							'senha' => 'required|confirmed',
					];
				}
			case 'PUT' :
			case 'PATCH' :
				{
					return [ 
							'nome' => 'required',
							'matricula' => 'required|string|size:12|unique:alunos,id,' . $aluno->id,
							'email' => 'required|email|unique:usuarios,id,' . $aluno->usuario->id 
					];
				}
			default :
				break;
		}
	}
}
