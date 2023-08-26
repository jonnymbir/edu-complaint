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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
			$table->string('ticket_number')->unique();
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('last_name');
			$table->string('email_address')->nullable();
			$table->string('telephone');
			$table->string('sex');
			$table->string('age_range')->nullable();

			$table->foreignId('region_id')->nullable()->constrained('regions')->onDelete('set null');
			$table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('set null');

			$table->string('stakeholder_type');
			$table->string('concern');
			$table->longText('details');
			$table->longText('response')->nullable();
			$table->boolean('is_forwarded')->default(0);
			$table->bigInteger('times_forwarded')->default(0);
			$table->json('attachments')->nullable();
			$table->string('response_channel')->comment("How the complainant wants to be contacted");
	        $table->boolean('is_anonymous')->default(false)->comment("Whether the complainant wants to be anonymous");
			$table->string('status')->default('pending')->comment('open, closed, pending, resolved, escalated, etc');
            $table->softDeletes();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
