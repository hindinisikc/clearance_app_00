<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /*
    This is a database migration that creates a clearance_requests table. Let me explain what it does in simple terms.
    What This Code Does
    Creates a new table called clearance_requests in your database
    The table will store:
    Clearance Request IDs (auto-numbered)
    Supervisor IDs (linked to the user table)
    Employee IDs (linked to the user table)
    Dates when requests were submitted
    Automatic timestamps (when records are created/updated)
    Also provides a way to delete the table if needed
    */

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clearance_requests', function (Blueprint $table) {
            $table->id('clearance_request_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('department_id'); // Add this line
            $table->timestamp('date_submitted')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearance_requests');
    }
};
