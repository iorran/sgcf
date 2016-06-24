<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestacionalFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacional_fisicos', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );
			
			$table->integer ( 'pa' );
			$table->integer ( 'fc' );  
			$table->integer ( 'fr' );   
			$table->integer( 'peso_antes' );
			$table->integer ( 'peso_atual' ); 
			$table->integer ( 'ganho' ); 
			$table->integer ( 'estatura' ); 
			$table->string ( 'vista_anterior' );   
			$table->string ( 'vista_lateral' );   
			$table->string ( 'vista_posterior' );  
			$table->string ( 'estatico' );    

			$table->string ( 'simetria' );
			$table->string ( 'mamilar' );   
			$table->string ( 'sensibilidade_mamilar' ); 
			$table->string ( 'secrecao' );   

			$table->string ( 'diastase' );

			$table->string ( 'flexao_anterior' );
			$table->string ( 'flexao_lateral' );  
			$table->string ( 'extensao' );    
			$table->string ( 'rotacao' );  
			$table->string ( 'av_neuro' );  
			$table->string ( 'av_muscular' );  
			$table->string ( 'palpacao' );  
			$table->string ( 'av_func' );  
			
			$table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gestacional_fisicos');
    }
}
