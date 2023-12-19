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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('categoria', 255);
            $table->string('titolo', 255);
            $table->string('slug', 255);
            $table->string('sottotitolo')->nullable();
            $table->text('descrizione');
            $table->string('durata', 3);
            $table->text('immagine')->default('immagine_placeholder_copertina.png');
            $table->text('video_corso')->nullable();
            $table->string('competenze_partenza', 255);
            $table->float('prezzo', 7, 2)->nullable();
            $table->text('programma');
            $table->string('obiettivi', 255);
            $table->boolean('attestato')->default(false);
            $table->text('descrizione_attestato')->nullable();
            $table->boolean('visibile')->default(true);
            $table->string('lingua')->nullable();
            $table->boolean('on_site')->default(false);
            $table->boolean('in_aula')->default(false);
            $table->boolean('fad')->default(false);
            $table->string('a_chi_si_rivolge', 255);
            $table->string('requisiti_richiesti', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
