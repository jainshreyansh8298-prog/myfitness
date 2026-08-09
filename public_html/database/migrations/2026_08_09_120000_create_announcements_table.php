<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_permanent')->default(true);
            // When not permanent, the announcement auto-deactivates after this timestamp.
            $table->timestamp('expires_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
