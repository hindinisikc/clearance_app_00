<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /*
    This is a database migration that creates a departments table. Let me explain what it does in simple terms.

    What This Code Does
    Creates a new table called departments in your database

    The table will store:

    Department IDs (auto-numbered)

    Department names (like "HR", "IT", "Finance")

    Automatic timestamps (when records are created/updated)

    Also provides a way to delete the table if needed

    */

    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->string('department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
