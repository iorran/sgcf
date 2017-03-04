<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use DB;
use Log; 
use Illuminate\Http\Request;
use App\Models\Anexo;
use File;

class HomeController extends Controller { 

	/**
	 * Retorna tela de login
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex() {
		$data['page_title'] = 'Home';
		return view ( 'paginas.home' )->with($data);
	}
	
	/**
	 * Realiza o upload
	 * 
	 */
	public function do_upload() {
		// 5 minutes execution time
		@set_time_limit(5 * 6000);
	
		$targetDir        = base_path('public\\uploads\\');
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge       = 500 * 3600; // Temp file age in seconds
	
		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}
	
		// Get a file name
		 
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}
	
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
	
		// Chunking might be enabled
		$chunk  = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
	
	
		// Remove old temp files
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}
				
			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
	
				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}
	
				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}
	
	
		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}
	
		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}
				
			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}
	
		while ($buff = fread($in, 4096)) { 
			fwrite($out, $buff);
		}
	
		@fclose($out);
		@fclose($in);
	
		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off
			rename("{$filePath}.part", $filePath);
		}
	
		// Return Success JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}
	
	/**
	 * Salva o arquivo no banco
	 * @param Request $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function save_upload(Request $request){  
		try {
			DB::beginTransaction ();
			$anexo = new Anexo();
			$anexo->caminho = $request->get ( "arquivo" );
			$anexo->arquivo_old = $request->get ( "arquivo_old" ); 
			$anexo->paciente_id = $request->get ( "paciente_id" ); 
			$anexo->agendamento_id = $request->get ( "agendamento_id" ); 
			$anexo->save ();
			DB::commit ();
				
			alert ()->success ( '', config ( 'constants.SAVED' ) )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e );
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		return redirect ( 'consulta/detalhes/' . $request->get ( "agendamento_id") );
	}

	/**
	 * Download do arquivo do diretorio
	 * @param unknown $anexo
	 */
	public function download_anexo($anexo){
		try {
			return response()->download(base_path('public\\uploads\\').$anexo);
		} catch ( \Exception $e ) {
			Log::error ( $e );
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
	}
	
	/**
	 * Delete do arquivo do diretorio
	 * @param unknown $anexo
	 */
	public function delete_anexo($anexo,$agendamento_id){
		try {   
			File::delete(base_path('public\\uploads\\').$anexo);
		} catch ( \Exception $e ) {
			Log::error ( $e );  
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}
		try {   
			DB::beginTransaction ();
 			$anexo = Anexo::where ( 'caminho', '=', $anexo )->first ();
 			$anexo->delete ();
 			DB::commit (); 
			alert ()->success ( '', 'Item removido com sucesso.' )->autoclose ( 2000 );
		} catch ( \Exception $e ) {
			Log::error ( $e ); 
			DB::rollback ();
			alert ()->error ( $e->getMessage (), 'Atenção' )->persistent ( 'Fechar' );
		}  
		return redirect ( 'consulta/detalhes/' . $agendamento_id);
	}
	  
	/**
	 * Realiza o backup
	 * 
	 */
	public function backup() {
    	 dd(1);
	} 
	 
	
	/**
	 * Error 404
	 *
	 * @return response
	 */
	public function missingMethod($params = array()) {
		return view ( 'errors.404', $params );
	}
}
