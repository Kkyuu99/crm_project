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
<<<<<<<< HEAD:database/migrations/2025_02_03_131718_create_issues_table.php
            $table->foreignId('project_id');
========
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
>>>>>>>> fe5005435fda480a6b596025c207e299b8517f26:database/migrations/2025_02_03_131731_create_issues_table.php
            $table->string('issue_status');
            $table->string('subject');
            $table->text('description');
            $table->string('priority');
            $table->string('attachment')->nullable();
            $table->foreignId('assignor_user')->constrained('users')->onDelete('cascade');
            $table->text('remark')->nullable();
<<<<<<<< HEAD:database/migrations/2025_02_03_131718_create_issues_table.php
            $table->integer('total_duration');
========
            $table->integer('total_duration')->default(0);
            $table->text('solution')->nullable();
            $table->date('due_date');
>>>>>>>> fe5005435fda480a6b596025c207e299b8517f26:database/migrations/2025_02_03_131731_create_issues_table.php
            $table->timestamps();
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
