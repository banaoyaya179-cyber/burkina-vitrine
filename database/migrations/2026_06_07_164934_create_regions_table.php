<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nom');
            $table->string('ancien_nom')->nullable();
            $table->string('chef_lieu');
            $table->string('zone')->nullable();
            $table->string('slogan')->nullable();
            $table->integer('superficie')->nullable();
            $table->bigInteger('population')->nullable();
            $table->float('densite')->nullable();
            $table->string('climat')->nullable();
            $table->string('vegetation')->nullable();
            $table->text('description')->nullable();
            $table->text('histoire')->nullable();
            $table->json('langues')->nullable();
            $table->json('peuples')->nullable();
            $table->json('voisins')->nullable();
            $table->string('image_hero')->nullable();
            $table->string('image_card')->nullable();
            $table->string('image_mini_carte')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('regions');
    }
};
