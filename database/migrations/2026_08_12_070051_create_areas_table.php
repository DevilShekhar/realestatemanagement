<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Country
            |--------------------------------------------------------------------------
            */
            $table->foreignId('country_id')
                ->constrained('countries')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | State
            |--------------------------------------------------------------------------
            */
            $table->foreignId('state_id')
                ->constrained('states')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | City
            |--------------------------------------------------------------------------
            */
            $table->foreignId('city_id')
                ->constrained('cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Area Name
            |--------------------------------------------------------------------------
            */
            $table->string('name');

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
            | Unique Area
            |--------------------------------------------------------------------------
            |
            | Same area name can exist in different cities,
            | but not twice in the same city.
            |
            */
            $table->unique([
                'city_id',
                'name'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
