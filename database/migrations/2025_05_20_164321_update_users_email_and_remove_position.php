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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique()->nullable()->after('name');
            }
            if (Schema::hasColumn('users', 'position')) {
                $table->dropColumn('position');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'position')) {
                $table->string('position')->after('username')->nullable();
            }
            if (Schema::hasColumn('users', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
};
