<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposerTheseEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposer_these_enseignants', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->enum('status',["fermer",'ouvert'])->default("ouvert");
            $table->string('sujet');
            $table->text('description');
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
        Schema::dropIfExists('proposer_these_enseignants');
    }
}
