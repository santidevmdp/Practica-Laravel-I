<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('tipo');
            $table->string('entidad');
            $table->enum('alcances', ['NACIONAL', 'PROVINCIAL', 'MUNICIPAL'])->default('MUNICIPAL');
            $table->integer('partida');
            $table->date('fIngreso');
            $table->date('fSalida');
            $table->text('observaciones')->nullable();
            $table->integer('deuda');
            $table->integer('pagado');
            $table->integer('balance');
            $table->enum('estados', ['SUCCESS', 'WARNING', 'DANGER'])->default('DANGER');
            $table->enum('periodos', ['MENSUAL', 'BIMESTRAL', 'TRIMESTRAL','CUATRIMESTRAL','SEMESTRAL', 'ANUAL'])->default('MENSUAL');
            $table->timestamps();

        });

        Schema::table('facturas', function (Blueprint $table) {
            
            //RELACIONES
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
