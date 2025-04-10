<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    This is a database migration that creates an employees table. Let me explain what it does in simple terms.
    What This Code Does
    Creates a new table called employees in your database
    The table will store:
    Employee IDs (auto-numbered)
    User IDs (linked to the user table)
    Employee first names
    Employee last names
    Automatic timestamps (when records are created/updated)
    Supervisor IDs (linked to the user table)
    Also provides a way to delete the table if needed
    */


    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();


            $table->unsignedBigInteger('supervisor_id');
            $table->foreign('supervisor_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
