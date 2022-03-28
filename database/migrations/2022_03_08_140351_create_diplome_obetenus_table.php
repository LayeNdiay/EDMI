<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomeObetenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplome_obetenus', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';

            $table->string("name");
            $table->string("fichier");
            $table->foreignId("piece_a_fournir_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('diplome_obetenus');
    }
}
