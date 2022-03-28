<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string("name");
            $table->string("adresse");
            $table->string("domaine");
            $table->foreignId("ecole_doctorale_id")->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('chefFormation');
            $table->foreign('chefFormation')->references('id')->on('enseignants');
            $table->unsignedBigInteger('dGEcole');
            $table->foreign('dGEcole')->references('id')->on('enseignants');
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
        Schema::dropIfExists('etablissements');
    }
}
