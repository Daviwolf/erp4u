<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('family', function (Blueprint $table) {
            $table->id();
            $table->string('family');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps(); // Este método já cria as colunas created_at e updated_at
        });
    }

    public function down() {
        Schema::dropIfExists('family');
    }
};
