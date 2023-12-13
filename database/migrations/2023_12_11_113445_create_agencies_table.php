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
            $table->text('logo')->default('immagine_placeholder.png');
            $table->text('immagine_copertina')->default('immagine_placeholder_copertina.jpg');
            $table->string('nome', 200);
            $table->string('slug', 255);
            $table->text('descrizione');
            $table->string('telefono');
            $table->string('indirizzo');
            $table->string('cap');
            $table->string('citta');
            $table->string('paese');
            $table->string('ragione_sociale');
            $table->string('p_iva');
            $table->string('tipo');
            $table->boolean('premium')->default(false);
            $table->string('pec_sdi');
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
