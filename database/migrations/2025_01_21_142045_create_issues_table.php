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
            $table->foreignId('project_id');
            $table->string('issue_status');
            $table->string('subject');
            $table->text('description');
            $table->string('priority')->default('medium');
            $table->string('attachment')->nullable();
            $table->string('assignor_user');
            $table->text('remark')->nullable();
            $table->string('total_duration');
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
