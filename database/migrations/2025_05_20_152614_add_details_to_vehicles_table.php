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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedTinyInteger('seats')->after('year')->nullable(); // Jumlah kursi
            $table->unsignedTinyInteger('luggage')->after('seats')->nullable(); // Jumlah koper
            $table->boolean('insurance')->default(false)->after('luggage'); // Asuransi
            $table->decimal('price', 12, 2)->after('insurance')->nullable(); // Harga per hari
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['seats', 'luggage', 'insurance', 'price']);
        });
    }
};
