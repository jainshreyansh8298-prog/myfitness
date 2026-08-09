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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users','id')
                ->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained('services','id')
                ->nullOnDelete();
            $table->enum('status',['pending','running','cancelled','completed'])
                ->default('pending');
            $table->enum('payment_status',['pending','success','failed'])
                ->default('pending');
            $table->integer('sessions_number')->unsigned()->default(1);
            $table->foreignId('area_id')->nullable()->constrained('areas','id')
                ->nullOnDelete();
            $table->timestamp('first_session_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
