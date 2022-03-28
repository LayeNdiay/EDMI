<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_admissions', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->enum("status",["attente","valider","refuser"])->default("attente");
            $table->enum("postuler",["yes","no"])->default("no");
            $table->enum('avisDirecteurDeThese',["attente","valider","refuser"])->default("attente");;
            $table->enum('avisDirecteurDeLabo',["attente","valider","refuser"])->default("attente");;
            $table->enum('avisDirecteurDeEcoleDoctorale',["attente","valider","refuser"])->default("attente");
            $table->enum('avisResponsableDoctorat',["attente","valider","refuser"])->default("attente");;
            $table->enum('avischefRatachement',["attente","valider","refuser"])->default("attente");;
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
            $table->foreignId('enseignant_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('dossier_admissions');
    }
}
