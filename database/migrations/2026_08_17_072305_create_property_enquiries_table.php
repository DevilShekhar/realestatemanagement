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
        Schema::create('property_enquiries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            $table->foreignId('buyer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('property_available', [
                'yes',
                'no',
                'maybe'
            ]);

            $table->enum('enquiry_type', [
                'general',
                'site_visit',
                'price',
                'documentation',
                'other'
            ])->nullable();

            $table->text('note');

            $table->enum('follow_up_required', [
                'yes',
                'no'
            ])->default('yes');

            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_enquiries');
    }
};
