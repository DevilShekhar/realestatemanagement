<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Property Category
            |--------------------------------------------------------------------------
            */
            $table->foreignId('property_category_id')
                ->constrained('property_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Location
            |--------------------------------------------------------------------------
            */
            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('state_id')
                ->constrained('states')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('city_id')
                ->constrained('cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('area_id')
                ->constrained('areas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Property Information
            |--------------------------------------------------------------------------
            */
            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->text('address')->nullable();

            $table->string('pincode', 20)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Property Pricing
            |--------------------------------------------------------------------------
            */
            $table->decimal('price', 15, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Property Details
            |--------------------------------------------------------------------------
            */
            $table->unsignedInteger('bedrooms')->nullable();

            $table->unsignedInteger('bathrooms')->nullable();

            $table->decimal('area', 12, 2)->nullable();

            $table->string('area_unit', 50)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */
            $table->boolean('status')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Created / Updated By
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
            | Indexes
            |--------------------------------------------------------------------------
            */
            $table->index('property_category_id');
            $table->index('country_id');
            $table->index('state_id');
            $table->index('city_id');
            $table->index('area_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
