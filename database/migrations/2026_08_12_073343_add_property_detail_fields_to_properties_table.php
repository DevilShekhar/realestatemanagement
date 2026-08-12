<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Common Property Fields
            |--------------------------------------------------------------------------
            */

            $table->enum('purpose', [
                'sale',
                'rent'
            ])
                ->nullable()
                ->after('description');

            $table->string('property_code')
                ->nullable()
                ->unique()
                ->after('slug');

            /*
            |--------------------------------------------------------------------------
            | Property Size
            |--------------------------------------------------------------------------
            */

            $table->decimal('built_up_area', 12, 2)
                ->nullable()
                ->after('area_unit');

            $table->decimal('carpet_area', 12, 2)
                ->nullable()
                ->after('built_up_area');

            $table->decimal('plot_area', 12, 2)
                ->nullable()
                ->after('carpet_area');

            /*
            |--------------------------------------------------------------------------
            | Residential Fields
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('bhk')
                ->nullable()
                ->after('bedrooms');

            $table->unsignedInteger('balconies')
                ->nullable()
                ->after('bathrooms');

            $table->unsignedInteger('parking')
                ->nullable()
                ->after('balconies');

            $table->string('facing')
                ->nullable()
                ->after('parking');

            $table->unsignedInteger('floor_number')
                ->nullable()
                ->after('facing');

            $table->unsignedInteger('total_floors')
                ->nullable()
                ->after('floor_number');

            $table->string('furnishing')
                ->nullable()
                ->after('total_floors');

            $table->year('construction_year')
                ->nullable()
                ->after('furnishing');

            $table->string('ownership')
                ->nullable()
                ->after('construction_year');

            /*
            |--------------------------------------------------------------------------
            | Commercial Fields
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('washrooms')
                ->nullable()
                ->after('ownership');

            $table->string('commercial_type')
                ->nullable()
                ->after('washrooms');

            $table->string('business_type')
                ->nullable()
                ->after('commercial_type');

            /*
            |--------------------------------------------------------------------------
            | Plot / Land Fields
            |--------------------------------------------------------------------------
            */

            $table->decimal('road_width', 10, 2)
                ->nullable()
                ->after('plot_area');

            $table->string('road_width_unit')
                ->nullable()
                ->after('road_width');

            $table->boolean('boundary_wall')
                ->nullable()
                ->after('road_width_unit');

            $table->string('land_type')
                ->nullable()
                ->after('boundary_wall');

            /*
            |--------------------------------------------------------------------------
            | Rental Fields
            |--------------------------------------------------------------------------
            */

            $table->decimal('monthly_rent', 15, 2)
                ->nullable()
                ->after('price');

            $table->decimal('security_deposit', 15, 2)
                ->nullable()
                ->after('monthly_rent');

            $table->date('available_from')
                ->nullable()
                ->after('security_deposit');

            $table->unsignedInteger('lease_period')
                ->nullable()
                ->after('available_from');

            $table->string('lease_period_unit')
                ->nullable()
                ->after('lease_period');

            /*
            |--------------------------------------------------------------------------
            | Resale Fields
            |--------------------------------------------------------------------------
            */

            $table->year('purchase_year')
                ->nullable()
                ->after('lease_period_unit');

            $table->unsignedInteger('property_age')
                ->nullable()
                ->after('purchase_year');

            /*
            |--------------------------------------------------------------------------
            | New Project Fields
            |--------------------------------------------------------------------------
            */

            $table->string('project_name')
                ->nullable()
                ->after('property_age');

            $table->string('developer_name')
                ->nullable()
                ->after('project_name');

            $table->string('project_status')
                ->nullable()
                ->after('developer_name');

            $table->date('launch_date')
                ->nullable()
                ->after('project_status');

            $table->date('possession_date')
                ->nullable()
                ->after('launch_date');

            $table->unsignedInteger('total_units')
                ->nullable()
                ->after('possession_date');

            $table->unsignedInteger('available_units')
                ->nullable()
                ->after('total_units');

            $table->string('rera_number')
                ->nullable()
                ->after('available_units');

            /*
            |--------------------------------------------------------------------------
            | Location Details
            |--------------------------------------------------------------------------
            */

            $table->string('landmark')
                ->nullable()
                ->after('pincode');

            $table->decimal('latitude', 10, 7)
                ->nullable()
                ->after('landmark');

            $table->decimal('longitude', 10, 7)
                ->nullable()
                ->after('latitude');

            /*
            |--------------------------------------------------------------------------
            | Additional Information
            |--------------------------------------------------------------------------
            */

            $table->text('additional_notes')
                ->nullable()
                ->after('longitude');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->dropUnique([
                'property_code'
            ]);

            $table->dropColumn([
                'purpose',
                'property_code',

                'built_up_area',
                'carpet_area',
                'plot_area',

                'bhk',
                'balconies',
                'parking',
                'facing',
                'floor_number',
                'total_floors',
                'furnishing',
                'construction_year',
                'ownership',

                'washrooms',
                'commercial_type',
                'business_type',

                'road_width',
                'road_width_unit',
                'boundary_wall',
                'land_type',

                'monthly_rent',
                'security_deposit',
                'available_from',
                'lease_period',
                'lease_period_unit',

                'purchase_year',
                'property_age',

                'project_name',
                'developer_name',
                'project_status',
                'launch_date',
                'possession_date',
                'total_units',
                'available_units',
                'rera_number',

                'landmark',
                'latitude',
                'longitude',
                'additional_notes',
            ]);
        });
    }
};