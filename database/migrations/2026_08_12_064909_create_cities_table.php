<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
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
            $table->string('name');

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */
            $table->boolean('status')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Created By
            |--------------------------------------------------------------------------
            */
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Updated By
            |--------------------------------------------------------------------------
            */
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Unique City
            |--------------------------------------------------------------------------
            |
            | Same city name can exist in different states,
            | but cannot be duplicated inside the same state.
            |
            */
            $table->unique([
                'state_id',
                'name'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
