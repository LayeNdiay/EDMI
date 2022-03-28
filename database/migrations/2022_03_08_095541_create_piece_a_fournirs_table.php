<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceAFournirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_a_fournirs', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string("cv");
            $table->string("charte");
            $table->string("projetDeThese");
            $table->string("AttestationDeBourse");
            $table->foreignId("dossier_admission_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('piece_a_fournirs');
    }
}
