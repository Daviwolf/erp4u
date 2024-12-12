<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tax_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('taxRateCode')->unique();
            $table->string('descriptionTaxRate');
            $table->double('taxRate', 8, 2);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tax_rates');
    }
};