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
            $table->date('date_of_birth')->nullable()->after('password');
			$table->enum('gender', ['Male','Female', 'Other']);
            $table->foreignId('country_id')->nullable()->constrained('country', 'id');
            $table->foreignId('state_id')->nullable()->constrained('state', 'id');
            $table->foreignId('city_id')->nullable()->constrained('city', 'id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropForeign(['country_id']);
            $table->dropForeign(['state_id']);
			$table->dropForeign(['city_id']);
            $table->dropColumn('country_id');
            $table->dropColumn('state_id');
			$table->dropColumn('city_id');
        });
    }
};
