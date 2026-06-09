<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('richesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->string('categorie');
            $table->string('icon')->nullable();
            $table->json('items');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('richesses');
    }
};
