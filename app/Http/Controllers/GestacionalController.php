<?php

namespace App\Http\Controllers;
use App\Models\AreaGestacional;
use App\Models\GestacionalCardiovascular;
use App\Models\GestacionalDigestivo;
use App\Models\GestacionalEspecial;
use App\Models\GestacionalFisico;
use App\Models\GestacionalGenitourinario;
use App\Models\GestacionalMusculo;
use App\Models\GestacionalNervoso;
use App\Models\GestacionalTegumentar;

use DB;
use Illuminate\Http\Request;
use Log;

class GestacionalController extends Controller {
	/**
	 * Salva Informações das consultas com area Gestacional 
	 *
	 * @param
	 *        	\App\Http\Requests\Request
	 *        	
	 */
	public function storeGestacional(Request $request) {  
		try {
			DB::beginTransaction ();
			
			$area = new AreaGestacional ();
			$area->paciente_id = $request->get ( 'paciente_id' );
			$area->agendamento_id = $request->get ( 'agendamento_id' );
			$area->dum = $request->get('dum');	
			$area->dpp = $request->get('dpp'); 	  
			$area->objetivo = $request->get('objetivo');

			$area->planejamento = $request->get('planejamento');
			$area->tto = $request->get('tto');
			$area->hasg = $request->get('hasg');
			$area->dmg = $request->get('dmg');			
			$area->eclampsia = $request->get('eclampsia');
			$area->parto = $request->get('parto');
			$area->ruptura = $request->get('ruptura');
			$area->placenta = $request->get('placenta');
			$area->incompetencia = $request->get('incompetencia');
			$area->recem = $request->get('recem');
			$area->save (); 
			
			$cardiovascular = new GestacionalCardiovascular ();
			$cardiovascular->has = $request->get('has');
			$cardiovascular->haig = $request->get('haig');
			$cardiovascular->problemas = $request->get('problemas');
			$cardiovascular->icc = $request->get('icc');
			$cardiovascular->varizes = $request->get('varizes');
			$cardiovascular->hemorroida = $request->get('hemorroida');
			$cardiovascular->tvp = $request->get('tvp');
			$cardiovascular->anemia = $request->get('anemia');
			$cardiovascular->mal = $request->get('mal');
			$cardiovascular->flebite = $request->get('flebite');
			$cardiovascular->taquicardia = $request->get('taquicardia');
			$cardiovascular->postural = $request->get('postural');
			$cardiovascular->supino = $request->get('supino');
			$cardiovascular->cardiovascular_obs = $request->get('cardiovascular_obs');
			$area->Cardiovascular ()->save ( $cardiovascular ); 

			$digestivo = new GestacionalDigestivo();
			$digestivo->constipacao = $request->get('constipacao');
			$digestivo->alteracao = $request->get('alteracao');
			$digestivo->esforco = $request->get('esforco');
			$digestivo->manobra = $request->get('manobra');
			$digestivo->sensacao = $request->get('sensacao');
			$digestivo->fecais = $request->get('fecais');
			$digestivo->flatos = $request->get('flatos'); 
			$digestivo->digestivo_obs = $request->get('digestivo_obs');
			$area->Digestivo ()->save ( $digestivo );
			
			$especial = new GestacionalEspecial();
			$especial->tredelemburg = $request->get('tredelemburg'); 
			$especial->lasegue = $request->get('lasegue'); 
			$especial->phalen = $request->get('phalen'); 
			$especial->piriforme = $request->get('piriforme'); 
			$especial->mmss = $request->get('mmss'); 
			$especial->mmii = $request->get('mmii'); 
			$area->Especial ()->save ( $especial );
			
			$fisico = new GestacionalFisico();
			$fisico->pa = $request->get('pa');
			$fisico->fc = $request->get('fc');
			$fisico->fr = $request->get('fr');
			$fisico->peso_antes = $request->get('peso_antes');
			$fisico->peso_atual = $request->get('peso_atual');
			$fisico->ganho = $request->get('ganho');
			$fisico->estatura = $request->get('estatura');
			$fisico->vista_anterior = $request->get('vista_anterior');
			$fisico->vista_lateral = $request->get('vista_lateral');
			$fisico->vista_posterior = $request->get('vista_posterior');
			$fisico->estatico = $request->get('estatico');
			
			$fisico->simetria = $request->get('simetria');
			$fisico->mamilar = $request->get('mamilar');
			$fisico->sensibilidade_mamilar = $request->get('sensibilidade_mamilar');
			$fisico->secrecao = $request->get('secrecao');
			
			$fisico->diastase = $request->get('diastase');
			
			$fisico->flexao_anterior = $request->get('flexao_anterior');
			$fisico->flexao_lateral = $request->get('flexao_lateral');
			$fisico->extensao = $request->get('extensao');
			$fisico->rotacao = $request->get('rotacao');
			$fisico->av_neuro = $request->get('av_neuro');
			$fisico->av_muscular = $request->get('av_muscular');
			$fisico->palpacao = $request->get('palpacao');
			$fisico->av_func = $request->get('av_func');
			$area->Fisico ()->save ( $fisico );
			
			$musculo = new GestacionalMusculo();
			$musculo->fratura = $request->get('fratura');
			$musculo->parestesia = $request->get('parestesia');
			$musculo->musculos_outros = $request->get('musculos_outros');
			$musculo->emocional = $request->get('emocional');
			$musculo->hf = $request->get('hf');
			$area->Musculo ()->save ( $musculo );
			
			$genito = new GestacionalGenitourinario();
			$genito->infeccao = $request->get('infeccao');
			$genito->perda = $request->get('perda');
			$genito->disuria = $request->get('disuria');
			$genito->sensacao = $request->get('sensacao');
			$genito->pelvica = $request->get('pelvica');
			$genito->abdominal = $request->get('abdominal');
			$genito->vaginal = $request->get('vaginal');
			$genito->costa = $request->get('costa');
			$genito->genito_obs = $request->get('genito_obs'); 
			$area->Genito ()->save ( $genito );
			
			$nervoso = new GestacionalNervoso();
			$nervoso->lipotimia = $request->get('lipotimia');
			$nervoso->virtigem = $request->get('virtigem');
			$nervoso->convulcao = $request->get('convulcao');
			$nervoso->parentesca = $request->get('parentesca');
			$area->Nervoso ()->save ( $nervoso );
			
			$tegumentar = new GestacionalTegumentar();
			$tegumentar->alergia = $request->get('alergia');
			$tegumentar->pele = $request->get('pele');
			$tegumentar->tegumentar_obs = $request->get('tegumentar_obs');  
			$area->Tegumentar ()->save ( $tegumentar );
			 
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
	public function updateGestacional(Request $request, $id) { 
		try {
			DB::beginTransaction ();
			
			$area = AreaGestacional::findOrFail ( $id );    
			$area->paciente_id = $request->get ( 'paciente_id' );
			$area->agendamento_id = $request->get ( 'agendamento_id' );
			$area->dum = $request->get('dum');	
			$area->dpp = $request->get('dpp'); 	  
			$area->objetivo = $request->get('objetivo');

			$area->planejamento = $request->get('planejamento');
			$area->tto = $request->get('tto');
			$area->hasg = $request->get('hasg');
			$area->dmg = $request->get('dmg');			
			$area->eclampsia = $request->get('eclampsia');
			$area->parto = $request->get('parto');
			$area->ruptura = $request->get('ruptura');
			$area->placenta = $request->get('placenta');
			$area->incompetencia = $request->get('incompetencia');
			$area->recem = $request->get('recem');
			$area->save (); 
			
			$cardiovascular = $area->cardiovascular;
			$cardiovascular->has = $request->get('has');
			$cardiovascular->haig = $request->get('haig');
			$cardiovascular->problemas = $request->get('problemas');
			$cardiovascular->icc = $request->get('icc');
			$cardiovascular->varizes = $request->get('varizes');
			$cardiovascular->hemorroida = $request->get('hemorroida');
			$cardiovascular->tvp = $request->get('tvp');
			$cardiovascular->anemia = $request->get('anemia');
			$cardiovascular->mal = $request->get('mal');
			$cardiovascular->flebite = $request->get('flebite');
			$cardiovascular->taquicardia = $request->get('taquicardia');
			$cardiovascular->postural = $request->get('postural');
			$cardiovascular->supino = $request->get('supino');
			$cardiovascular->cardiovascular_obs = $request->get('cardiovascular_obs'); 

			$digestivo = $area->digestivo;
			$digestivo->constipacao = $request->get('constipacao');
			$digestivo->alteracao = $request->get('alteracao');
			$digestivo->esforco = $request->get('esforco');
			$digestivo->manobra = $request->get('manobra');
			$digestivo->sensacao = $request->get('sensacao');
			$digestivo->fecais = $request->get('fecais');
			$digestivo->flatos = $request->get('flatos'); 
			$digestivo->digestivo_obs = $request->get('digestivo_obs'); 
			
			
			$especial = $area->especial;
			$especial->tredelemburg = $request->get('tredelemburg'); 
			$especial->lasegue = $request->get('lasegue'); 
			$especial->phalen = $request->get('phalen'); 
			$especial->piriforme = $request->get('piriforme'); 
			$especial->mmss = $request->get('mmss'); 
			$especial->mmii = $request->get('mmii');  

			$fisico = $area->fisico;
			$fisico->pa = $request->get('pa');
			$fisico->fc = $request->get('fc');
			$fisico->fr = $request->get('fr');
			$fisico->peso_antes = $request->get('peso_antes');
			$fisico->peso_atual = $request->get('peso_atual');
			$fisico->ganho = $request->get('ganho');
			$fisico->estatura = $request->get('estatura');
			$fisico->vista_anterior = $request->get('vista_anterior');
			$fisico->vista_lateral = $request->get('vista_lateral');
			$fisico->vista_posterior = $request->get('vista_posterior');
			$fisico->estatico = $request->get('estatico');
			
			$fisico->simetria = $request->get('simetria');
			$fisico->mamilar = $request->get('mamilar');
			$fisico->sensibilidade_mamilar = $request->get('sensibilidade_mamilar');
			$fisico->secrecao = $request->get('secrecao');
			
			$fisico->diastase = $request->get('diastase');
			
			$fisico->flexao_anterior = $request->get('flexao_anterior');
			$fisico->flexao_lateral = $request->get('flexao_lateral');
			$fisico->extensao = $request->get('extensao');
			$fisico->rotacao = $request->get('rotacao');
			$fisico->av_neuro = $request->get('av_neuro');
			$fisico->av_muscular = $request->get('av_muscular');
			$fisico->palpacao = $request->get('palpacao');
			$fisico->av_func = $request->get('av_func'); 

			$musculo = $area->musculo;
			$musculo->fratura = $request->get('fratura');
			$musculo->parestesia = $request->get('parestesia');
			$musculo->musculos_outros = $request->get('musculos_outros');
			$musculo->emocional = $request->get('emocional');
			$musculo->hf = $request->get('hf'); 
			
			$genito = $area->genito;
			$genito->infeccao = $request->get('infeccao');
			$genito->perda = $request->get('perda');
			$genito->disuria = $request->get('disuria');
			$genito->sensacao = $request->get('sensacao');
			$genito->pelvica = $request->get('pelvica');
			$genito->abdominal = $request->get('abdominal');
			$genito->vaginal = $request->get('vaginal');
			$genito->costa = $request->get('costa');
			$genito->genito_obs = $request->get('genito_obs');  

			$nervoso = $area->nervoso;
			$nervoso->lipotimia = $request->get('lipotimia');
			$nervoso->virtigem = $request->get('virtigem');
			$nervoso->convulcao = $request->get('convulcao');
			$nervoso->parentesca = $request->get('parentesca'); 

			$tegumentar = $area->tegumentar;
			$tegumentar->alergia = $request->get('alergia');
			$tegumentar->pele = $request->get('pele');
			$tegumentar->tegumentar_obs = $request->get('tegumentar_obs');   
			
			$area->push ();
			 
			DB::commit (); 
			alert ()->success ( '', config ( 'constants.UPDATED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $area->agendamento_id );
	}
}
