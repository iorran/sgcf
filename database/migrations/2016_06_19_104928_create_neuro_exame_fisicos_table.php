<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeuroExameFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neuro_exame_fisicos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_neuro_id', false, true );
			$table->foreign ( 'area_neuro_id' )->references ( 'id' )->on ( 'area_neuros' );
			
			$table->integer ( 'fc_bpm');
			$table->integer ( 'fr_irpm');
			$table->integer ( 'pa');
			$table->integer ( 'mmhg');
			$table->integer ( 'temperatura');
			$table->string ( 'alscuta_pulmonar');
			$table->string ( 'inspecao');
			$table->string ( 'geral_atitude');
			$table->string ( 'local');
			$table->string ( 'face');
			$table->string ( 'palpacao');
			$table->string ( 'movimento_passivo');
			$table->string ( 'movimento_voluntario');
			
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
        Schema::drop('neuro_exame_fisicos');
    }
}
