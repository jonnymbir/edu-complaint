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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
			$table->foreignId('complaint_id')->constrained('complaints')->onDelete('cascade');
			$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
			$table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('set null');
			$table->longText('comment');
			$table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
