<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedInteger('car_parking')
                ->nullable()
                ->after('parking');

            $table->unsignedInteger('bike_parking')
                ->nullable()
                ->after('car_parking');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'car_parking',
                'bike_parking',
            ]);
        });
    }
};