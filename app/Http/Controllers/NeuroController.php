<?php

namespace App\Http\Controllers;

use App\Models\AreaNeuro;
use App\Models\NeuroEquilibrio;
use App\Models\NeuroReflexoPostural;
use App\Models\NeuroExameFisico;
use App\Models\NeuroReflexoSuperficial;
use App\Models\NeuroManobrasDeficitarias;
use App\Models\NeuroCoordenacao;
use DB;
use Illuminate\Http\Request;
use Log;

class NeuroController extends Controller {
	/**
	 * Salva Informações das consultas com area Neuro Ortopedica
	 *
	 * @param
	 *        	\App\Http\Requests\Request
	 *        	
	 */
	public function storeNeuro(Request $request) {
		try {
			DB::beginTransaction ();
			
			$sensibilidade = new AreaNeuro ();
			$sensibilidade->paciente_id = $request->get ( 'paciente_id' );
			$sensibilidade->agendamento_id = $request->get ( 'agendamento_id' );
			$sensibilidade->tatil = $request->get ( 'tatil' );
			$sensibilidade->termica = $request->get ( 'termica' );
			$sensibilidade->dolorosa = $request->get ( 'dolorosa' );
			$sensibilidade->palestesia = $request->get ( 'palestesia' );
			$sensibilidade->barestesia = $request->get ( 'barestesia' );
			$sensibilidade->barognesia = $request->get ( 'barognesia' );
			$sensibilidade->grafestesia = $request->get ( 'grafestesia' );
			$sensibilidade->propriecptiva = $request->get ( 'propriecptiva' );
			$sensibilidade->descricao_de_marcha = $request->get ( 'descricao_de_marcha' );
			$sensibilidade->nervos_cranianos = $request->get ( 'nervos_cranianos' );
			$sensibilidade->linguagem = $request->get ( 'linguagem' );
			$sensibilidade->comportamento = $request->get ( 'comportamento' );
			$sensibilidade->sincinesias = $request->get ( 'sincinesias' );
			$sensibilidade->gnosia = $request->get ( 'gnosia' );
			$sensibilidade->praxia = $request->get ( 'praxia' );
			$sensibilidade->memoria_recente = $request->get ( 'memoria_recente' );
			$sensibilidade->memoria_remota = $request->get ( 'memoria_remota' );
			$sensibilidade->save ();
			
			$equilibrio = new NeuroEquilibrio ();
			$equilibrio->romberg_simples = $request->get ( 'romberg_simples' );
			$equilibrio->romberg_sensib = $request->get ( 'romberg_sensib' );
			$sensibilidade->Equilibrio ()->save ( $equilibrio );
			
			$manobra = new NeuroManobrasDeficitarias ();
			$manobra->bracos_estend = $request->get ( 'bracos_estend' );
			$manobra->barre = $request->get ( 'barre' );
			$manobra->mingazzini = $request->get ( 'mingazzini' );
			$sensibilidade->Manobra()->save ( $manobra ); 
			
			$coordenacao = new NeuroCoordenacao ();
			$coordenacao->index_index = $request->get ( 'index_index' );
			$coordenacao->index_nariz_index = $request->get ( 'index_nariz_index' );
			$coordenacao->index_nariz = $request->get ( 'index_nariz' );
			$coordenacao->index_index_terapeuta = $request->get ( 'index_index_terapeuta' );
			$coordenacao->diadococinesia = $request->get ( 'diadococinesia' );
			$coordenacao->grafia = $request->get ( 'grafia' );
			$coordenacao->calcanhar_joelho = $request->get ( 'calcanhar_joelho' );
			$coordenacao->batida_do_pe = $request->get ( 'batida_do_pe' );
			$coordenacao->outros = $request->get ( 'outros' ); 
			$sensibilidade->Coordenacao()->save ( $coordenacao ); 
			
			$postural = new NeuroReflexoPostural ();
			$postural->dd_dle = $request->get ( 'dd_dle' ); 
			$postural->dle_dv = $request->get ( 'dle_dv' ); 
			$postural->dv_puppy = $request->get ( 'dv_puppy' ); 
			$postural->puppy_joelhod = $request->get ( 'puppy_joelhod' ); 
			$postural->sentado = $request->get ( 'sentado' ); 
			$postural->ajoelhado_semi_ajoelhado = $request->get ( 'ajoelhado_semi_ajoelhado' ); 
			$postural->rolar = $request->get ( 'rolar' ); 
			$postural->arrastar_homolat = $request->get ( 'arrastar_homolat' ); 
			$postural->dd_dld = $request->get ( 'dd_dld' ); 
			$postural->dld_dv = $request->get ( 'dld_dv' ); 
			$postural->puppy_joelhoe = $request->get ( 'puppy_joelhoe' );
			$postural->quatro_apoio = $request->get ( 'quatro_apoio' );
			$postural->quatro_apoio_ajoelhado = $request->get ( 'quatro_apoio_ajoelhado' );
			$postural->semi_aj_ortoest = $request->get ( 'semi_aj_ortoest' );
			$postural->arrastar_cruzado = $request->get ( 'arrastar_cruzado' );
			$postural->tronco = $request->get ( 'tronco' ); 
			$sensibilidade->Postural()->save ( $postural );  
			
			$superficial = new NeuroReflexoSuperficial ();
			$superficial->babinski = $request->get ( 'babinski' );
			$superficial->gordon = $request->get ( 'gordon' );
			$superficial->warterbenrg = $request->get ( 'warterbenrg' );
			$superficial->oppenhein = $request->get ( 'oppenhein' );
			$superficial->rossolino = $request->get ( 'rossolino' );
			$superficial->cutaneo_abdominal = $request->get ( 'cutaneo_abdominal' );
			$superficial->chacddock = $request->get ( 'chacddock' );
			$superficial->hoffman = $request->get ( 'hoffman' );
			$superficial->mandibular = $request->get ( 'mandibular' ); 
			$superficial->outro = $request->get ( 'outro' ); 
			$superficial->aquileu = $request->get ( 'aquileu' ); 
			$superficial->patelar = $request->get ( 'patelar' );   
			$sensibilidade->Superficial()->save ( $superficial );
			 
			$exame = new NeuroExameFisico ();
			$exame->fc_bpm = $request->get ( 'fc_bpm' );
			$exame->fr_irpm = $request->get ( 'fr_irpm' );
			$exame->pa = $request->get ( 'pa' );
			$exame->mmhg = $request->get ( 'mmhg' );
			$exame->temperatura = $request->get ( 'temperatura' );
			$exame->alscuta_pulmonar = $request->get ( 'alscuta_pulmonar' );
			$exame->inspecao = $request->get ( 'inspecao' );
			$exame->geral_atitude = $request->get ( 'geral_atitude' );
			$exame->local = $request->get ( 'local' ); 
			$exame->face = $request->get ( 'face' ); 
			$exame->palpacao = $request->get ( 'palpacao' ); 
			$exame->movimento_passivo = $request->get ( 'movimento_passivo' ); 
			$exame->movimento_voluntario = $request->get ( 'movimento_voluntario' );   
			$sensibilidade->Exame()->save ( $exame );  
			
			DB::commit ();
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/iniciada/' . $request->get ( "agendamento_id" ) );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function updateNeuro(Request $request, $id) {
		try {
			DB::beginTransaction ();
			
			$sensibilidade = AreaNeuro::findOrFail ( $id );  
			$sensibilidade->paciente_id = $request->get ( 'paciente_id' );
			$sensibilidade->agendamento_id = $request->get ( 'agendamento_id' );
			$sensibilidade->tatil = $request->get ( 'tatil' );
			$sensibilidade->termica = $request->get ( 'termica' );
			$sensibilidade->dolorosa = $request->get ( 'dolorosa' );
			$sensibilidade->palestesia = $request->get ( 'palestesia' );
			$sensibilidade->barestesia = $request->get ( 'barestesia' );
			$sensibilidade->barognesia = $request->get ( 'barognesia' );
			$sensibilidade->grafestesia = $request->get ( 'grafestesia' );
			$sensibilidade->propriecptiva = $request->get ( 'propriecptiva' );
			$sensibilidade->descricao_de_marcha = $request->get ( 'descricao_de_marcha' );
			$sensibilidade->nervos_cranianos = $request->get ( 'nervos_cranianos' );
			$sensibilidade->linguagem = $request->get ( 'linguagem' );
			$sensibilidade->comportamento = $request->get ( 'comportamento' );
			$sensibilidade->sincinesias = $request->get ( 'sincinesias' );
			$sensibilidade->gnosia = $request->get ( 'gnosia' );
			$sensibilidade->praxia = $request->get ( 'praxia' );
			$sensibilidade->memoria_recente = $request->get ( 'memoria_recente' );
			$sensibilidade->memoria_remota = $request->get ( 'memoria_remota' );
			$sensibilidade->save ();
				
			$equilibrio = $sensibilidade->equilibrio;
			$equilibrio->romberg_simples = $request->get ( 'romberg_simples' );
			$equilibrio->romberg_sensib = $request->get ( 'romberg_sensib' );
			$sensibilidade->Equilibrio ()->save ( $equilibrio );
				
			$manobras = $sensibilidade->manobras;
			$manobras->bracos_estend = $request->get ( 'bracos_estend' );
			$manobras->barre = $request->get ( 'barre' );
			$manobras->mingazzini = $request->get ( 'mingazzini' );
			$sensibilidade->Manobras()->save ( $manobras );
				
			$coordenacao = $sensibilidade->coordenacao;
			$coordenacao->index_index = $request->get ( 'index_index' );
			$coordenacao->index_nariz_index = $request->get ( 'index_nariz_index' );
			$coordenacao->index_nariz = $request->get ( 'index_nariz' );
			$coordenacao->index_index_terapeuta = $request->get ( 'index_index_terapeuta' );
			$coordenacao->diadococinesia = $request->get ( 'diadococinesia' );
			$coordenacao->grafia = $request->get ( 'grafia' );
			$coordenacao->calcanhar_joelho = $request->get ( 'calcanhar_joelho' );
			$coordenacao->batida_do_pe = $request->get ( 'batida_do_pe' );
			$coordenacao->outros = $request->get ( 'outros' );
			$sensibilidade->Coordenacao()->save ( $coordenacao );
				
			$postural = $sensibilidade->postural;
			$postural->dd_dle = $request->get ( 'dd_dle' );
			$postural->dle_dv = $request->get ( 'dle_dv' );
			$postural->dv_puppy = $request->get ( 'dv_puppy' );
			$postural->puppy_joelhod = $request->get ( 'puppy_joelhod' );
			$postural->sentado = $request->get ( 'sentado' );
			$postural->ajoelhado_semi_ajoelhado = $request->get ( 'ajoelhado_semi_ajoelhado' );
			$postural->rolar = $request->get ( 'rolar' );
			$postural->arrastar_homolat = $request->get ( 'arrastar_homolat' );
			$postural->dd_dld = $request->get ( 'dd_dld' );
			$postural->dld_dv = $request->get ( 'dld_dv' );
			$postural->puppy_joelhoe = $request->get ( 'puppy_joelhoe' );
			$postural->quatro_apoio = $request->get ( 'quatro_apoio' );
			$postural->quatro_apoio_ajoelhado = $request->get ( 'quatro_apoio_ajoelhado' );
			$postural->semi_aj_ortoest = $request->get ( 'semi_aj_ortoest' );
			$postural->arrastar_cruzado = $request->get ( 'arrastar_cruzado' );
			$postural->tronco = $request->get ( 'tronco' );
			$sensibilidade->Postural()->save ( $postural );

			$superficial = $sensibilidade->superficial; 
			$superficial->babinski = $request->get ( 'babinski' );
			$superficial->gordon = $request->get ( 'gordon' );
			$superficial->warterbenrg = $request->get ( 'warterbenrg' );
			$superficial->oppenhein = $request->get ( 'oppenhein' );
			$superficial->rossolino = $request->get ( 'rossolino' );
			$superficial->cutaneo_abdominal = $request->get ( 'cutaneo_abdominal' );
			$superficial->chacddock = $request->get ( 'chacddock' );
			$superficial->hoffman = $request->get ( 'hoffman' );
			$superficial->mandibular = $request->get ( 'mandibular' );
			$superficial->outro = $request->get ( 'outro' );
			$superficial->aquileu = $request->get ( 'aquileu' );
			$superficial->patelar = $request->get ( 'patelar' );
			$sensibilidade->Superficial()->save ( $superficial );
			
			$exame = $sensibilidade->exame; 
			$exame->fc_bpm = $request->get ( 'fc_bpm' );
			$exame->fr_irpm = $request->get ( 'fr_irpm' );
			$exame->pa = $request->get ( 'pa' );
			$exame->mmhg = $request->get ( 'mmhg' );
			$exame->temperatura = $request->get ( 'temperatura' );
			$exame->alscuta_pulmonar = $request->get ( 'alscuta_pulmonar' );
			$exame->inspecao = $request->get ( 'inspecao' );
			$exame->geral_atitude = $request->get ( 'geral_atitude' );
			$exame->local = $request->get ( 'local' );
			$exame->face = $request->get ( 'face' );
			$exame->palpacao = $request->get ( 'palpacao' );
			$exame->movimento_passivo = $request->get ( 'movimento_passivo' );
			$exame->movimento_voluntario = $request->get ( 'movimento_voluntario' );
			$sensibilidade->Exame()->save ( $exame );
			 
			$sensibilidade->push ();
			
			DB::commit (); 
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $sensibilidade->agendamento_id );
	}
}
