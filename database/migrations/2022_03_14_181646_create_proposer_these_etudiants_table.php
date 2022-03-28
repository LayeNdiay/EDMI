<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposerTheseEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposer_these_etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("cv");
            $table->string("sujet");
            $table->text("description");
            $table->enum("confirmationEnseignant",["attente","valider","refuser"])->default("attente");
            $table->foreignId("etudiant_id")->constrained()->onDelete('cascade');
            $table->foreignId("enseignant_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('proposer_these_etudiants');
    }
}
