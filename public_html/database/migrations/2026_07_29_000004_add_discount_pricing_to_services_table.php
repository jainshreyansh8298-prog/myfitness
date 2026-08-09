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
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'discount_percentage')) {
                $table->integer('discount_percentage')->nullable()->after('price_after');
            }
            if (!Schema::hasColumn('services', 'badge_text')) {
                $table->string('badge_text')->nullable()->after('discount_percentage');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['discount_percentage', 'badge_text']);
        });
    }
};
