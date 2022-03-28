<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatPostulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_postulers', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string("cv");
            $table->enum("status",["attente","valider","refuser"])->default("attente");
            $table->enum("confirmationEnseignant",["attente","valider","refuser"])->default("attente");
            $table->enum("confirmationEtudiant",["attente","valider","refuser"])->default("attente");
            $table->foreignId("etudiant_id")->constrained()->onDelete('cascade');
            $table->foreignId("proposer_these_enseignant_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('candidat_postulers');
    }
}
