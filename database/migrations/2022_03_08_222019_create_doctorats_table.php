<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorats', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';

            $table->string("intituleDoctorat");
            $table->text("sujet"); 
            $table->foreignId("dossier_admission_id")->constrained()->onDelete('cascade');
            $table->foreignId("etablissement_id")->constrained()->onDelete('cascade');
            $table->foreignId("laboratoires_id")->constrained()->onDelete('cascade');
            $table->foreignId("ecole_doctorale_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('doctorats');
    }
}
