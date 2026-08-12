<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_category_id',
        'approval',

        'country_id',
        'state_id',
        'city_id',
        'area_id',

        'title',
        'slug',
        'property_code',
        'description',
        'purpose',
        'address',
        'pincode',
        'landmark',

        'price',
        'monthly_rent',
        'security_deposit',

        'area',
        'area_unit',
        'built_up_area',
        'carpet_area',
        'plot_area',

        'bedrooms',
        'bathrooms',
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

        'latitude',
        'longitude',
        'additional_notes',

        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Property Category
    |--------------------------------------------------------------------------
    */

    public function propertyCategory()
    {
        return $this->belongsTo(
            PropertyCategory::class,
            'property_category_id'
        );
    }

    public function country()
    {
        return $this->belongsTo(
            Country::class,
            'country_id'
        );
    }

    public function state()
    {
        return $this->belongsTo(
            State::class,
            'state_id'
        );
    }

    public function city()
    {
        return $this->belongsTo(
            City::class,
            'city_id'
        );
    }

    public function area()
    {
        return $this->belongsTo(
            Area::class,
            'area_id'
        );
    }
    public function propertyArea(): BelongsTo
    {
        return $this->belongsTo(
            Area::class,
            'area_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Amenities
    |--------------------------------------------------------------------------
    */

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(
            Amenity::class,
            'property_amenity'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Property Images
    |--------------------------------------------------------------------------
    */

    
    public function images(): HasMany
    {
        return $this->hasMany(
            PropertyImage::class,
            'property_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Property Documents
    |--------------------------------------------------------------------------
    */

    public function documents(): HasMany
    {
        return $this->hasMany(PropertyDocument::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Property Approvals
    |--------------------------------------------------------------------------
    */

    public function approvals(): HasMany
    {
        return $this->hasMany(PropertyApproval::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Created By
    |--------------------------------------------------------------------------
    */

    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Updated By
    |--------------------------------------------------------------------------
    */

    public function updater(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'updated_by'
        );
    }
}
