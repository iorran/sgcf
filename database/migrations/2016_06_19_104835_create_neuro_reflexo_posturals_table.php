<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeuroReflexoPosturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neuro_reflexo_posturals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_neuro_id', false, true );
			$table->foreign ( 'area_neuro_id' )->references ( 'id' )->on ( 'area_neuros' );
			
			$table->string ( 'dd_dle');
			$table->string ( 'dle_dv');
			$table->string ( 'dv_puppy');
			$table->string ( 'puppy_joelhod');
			$table->string ( 'sentado');
			$table->string ( 'ajoelhado_semi_ajoelhado');
			$table->string ( 'rolar');
			$table->string ( 'arrastar_homolat');
			$table->string ( 'dd_dld');
			$table->string ( 'dld_dv');
			$table->string ( 'puppy_joelhoe');
			$table->string ( 'quatro_apoio');
			$table->string ( 'quatro_apoio_ajoelhado');
			$table->string ( 'semi_aj_ortoest');
			$table->string ( 'arrastar_cruzado');
			$table->string ( 'tronco');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('neuro_reflexo_posturals');
    }
}
