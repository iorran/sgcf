<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardioFatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardio_fators', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_cardio_id', false, true );
			$table->foreign ( 'area_cardio_id' )->references ( 'id' )->on ( 'area_cardios' );

			$table->string ( 'historia' );
			$table->string ( 'fumo' );
			$table->string ( 'hipertensao' );
			$table->string ( 'hipercolesterolemia' );
			$table->string ( 'glicose_jejum' );
			$table->string ( 'obesidade' );
			$table->string ( 'estilo' );
			$table->string ( 'colesterol' );
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
        Schema::drop('cardio_fators');
    }
}
