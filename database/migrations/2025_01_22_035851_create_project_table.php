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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('organization_name');
            $table->string('project_type');
            $table->string('project_manager');
            $table->foreignId('issue_id');
            $table->foreignId('user_id');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email')->unique();
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
