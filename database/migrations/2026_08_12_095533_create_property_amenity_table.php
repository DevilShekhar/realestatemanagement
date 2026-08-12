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
        Schema::create('property_amenity', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Property
            |--------------------------------------------------------------------------
            */
            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Amenity
            |--------------------------------------------------------------------------
            */
            $table->foreignId('amenity_id')
                ->constrained('amenities')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Created / Updated
            |--------------------------------------------------------------------------
            */
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Prevent duplicate amenities for same property
            |--------------------------------------------------------------------------
            */
            $table->unique([
                'property_id',
                'amenity_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_amenity');
    }
};