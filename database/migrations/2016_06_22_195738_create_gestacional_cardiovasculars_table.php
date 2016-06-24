<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestacionalCardiovascularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestacional_cardiovasculars', function (Blueprint $table) {
            $table->increments('id');
			$table->integer ( 'area_gestacional_id', false, true );
			$table->foreign ( 'area_gestacional_id' )->references ( 'id' )->on ( 'area_gestacionals' );

			$table->string('has');
			$table->string('haig');
			$table->string('problemas');
			$table->string('icc');
			$table->string('varizes'); 
			$table->string('hemorroida');
			$table->string('tvp');
			$table->string('anemia');
			$table->string('mal');
			$table->string('flebite');
			$table->string('taquicardia');
			$table->string('postural');
			$table->string('supino');
			$table->longText ( 'cardiovascular_obs'); 
			
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
        Schema::drop('gestacional_cardiovasculars');
    }
}
