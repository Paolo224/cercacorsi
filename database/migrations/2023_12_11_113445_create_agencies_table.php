<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('slug', 255);
            $table->text('logo')->default('immagine_placeholder.png');
            $table->text('immagine_copertina')->default('immagine_placeholder_copertina.jpg');
            $table->text('video_presentazione')->default('#');
            $table->text('descrizione');
            $table->text('motto');
            $table->string('telefono1', 10);
            $table->string('telefono2', 10)->nullable();
            $table->string('email');
            $table->string('indirizzo');
            $table->string('cap', 5);
            $table->string('citta');
            $table->string('provincia', 2);
            $table->string('paese');
            $table->string('ragione_sociale');
            $table->string('p_iva', 13);
            $table->string('codice_fiscale', 16)->nullable();
            $table->string('tipo');
            $table->string('pec_sdi');
            $table->text('altre_informazioni');
            $table->boolean('premium')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
