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
<<<<<<< HEAD
            $table->foreignId('issue_id');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
=======
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('status')->default('Active');
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by')->nullable();
            // $table->unsignedBigInteger('deleted_by')->nullable();
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};