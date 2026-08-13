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
        Schema::create('area_services', function (Blueprint $table) {
            $table->foreignId('area_id')->constrained('areas','id')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services','id')->cascadeOnDelete();
            $table->primary([
                'area_id','service_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_services');
    }
};
