<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etablissement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Etablissement', function (Blueprint $table) {
            $table->char('idEtablissement', 8)->primary();
            $table->string('nom', 45);
            $table->string('adresseRue', 5,);
            $table->char('codePostal', 45);
            $table->char('ville', 35);
            $table->string('tel', 15);
            $table->string('adresseElectronique', null, 70);
            $table->integer('type', 1);
            $table->string('civiliteResponsable', 12);
            $table->string('nomResponsable', 25);
            $table->string('prenomResponsable', null, 25);
            $table->integer('nombreChambresOffertes', null, 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Etablissement');
    }
}
