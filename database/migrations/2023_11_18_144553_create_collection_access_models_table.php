<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('collection_access_models', function (Blueprint $table) {
            $table->id();
            $table->uuid('collection_id');
            $table->string('model_type');
            $table->string('model_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collection_access_models');
    }
};
