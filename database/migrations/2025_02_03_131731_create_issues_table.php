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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->string('issue_status');
            $table->string('subject');
            $table->text('description');
            $table->string('priority');
            $table->string('attachment')->nullable();
            $table->foreignId('assignor_user')->constrained('users')->onDelete('cascade');
            $table->text('remark')->nullable();
            $table->integer('total_duration')->default(0);
            $table->text('solution')->nullable();
            $table->date('due_date');
            $table->timestamps();

            $table->softDeletes();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
