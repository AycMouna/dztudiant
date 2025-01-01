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
        Schema::create('project_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');  // Foreign key to projects
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users
            $table->enum('status', ['pending', 'in_progress', 'completed']);  // Project tracking status
            $table->text('comment')->nullable();  // Comment/feedback
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_tracking');
    }
};
