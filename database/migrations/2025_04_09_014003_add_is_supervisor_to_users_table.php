<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /*
    This is a database migration that adds an is_supervisor column to the users table. Let me explain what it does in simple terms.
    What This Code Does
    Adds a new column called is_supervisor to the users table
    The column will store true or false values (0 or 1)
    This column indicates whether a user is a supervisor or not
    The default value is false (0)
    Also provides a way to remove the column if needed
    */



    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_supervisor')->default(false);
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_supervisor');
        });
    }
};
