<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{
    /**
     * Buyer Property Search
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AJAX REQUEST
        |--------------------------------------------------------------------------
        */

        if ($request->ajax()) {

            /*
            |--------------------------------------------------------------------------
            | FILTER MASTER DATA
            |--------------------------------------------------------------------------
            */

            $propertyCategories = PropertyCategory::orderBy('name')
                ->get([
                    'id',
                    'name'
                ]);

            $amenities = Amenity::orderBy('name')
                ->get([
                    'id',
                    'name'
                ]);

            $countries = Country::orderBy('name')
                ->get([
                    'id',
                    'name'
                ]);
            $states = State::orderBy('name')
                    ->get([
                        'id',
                        'name',
                        'country_id'
                    ]);

                $cities = City::orderBy('name')
                    ->get([
                        'id',
                        'name',
                        'state_id'
                    ]);

                $areas = Area::orderBy('name')
                    ->get([
                        'id',
                        'name',
                        'city_id'
                    ]);


            /*
            |--------------------------------------------------------------------------
            | BASE PROPERTY QUERY
            |--------------------------------------------------------------------------
            */

            $query = Property::query()
                ->where('approval', 1)
                ->where('status', 1);


            /*
            |--------------------------------------------------------------------------
            | PURPOSE
            |--------------------------------------------------------------------------
            |
            | Buyer UI:
            |
            | purchase => database sale
            | rent     => database rent
            |
            */

            if ($request->filled('purpose')) {

                $purpose = $request->purpose;

                if ($purpose === 'purchase') {
                    $purpose = 'sale';
                }

                $query->where('purpose', $purpose);
            }


            /*
            |--------------------------------------------------------------------------
            | PROPERTY CATEGORY
            |--------------------------------------------------------------------------
            */

            if ($request->filled('property_category_id')) {

                $query->where(
                    'property_category_id',
                    $request->property_category_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | RESIDENTIAL FILTERS
            |--------------------------------------------------------------------------
            */
            if ($request->filled('residential_type')) {
                $query->where(
                    'residential_type',
                    $request->residential_type
                );
            }

            if ($request->filled('bhk')) {

                $query->where(
                    'bhk',
                    $request->bhk
                );
            }

            if ($request->filled('monthly_rent')) {

                $query->where(
                    'monthly_rent',
                    '<=',
                    $request->monthly_rent
                );
            }

            if ($request->filled('bedrooms')) {

                $query->where(
                    'bedrooms',
                    $request->bedrooms
                );
            }

            if ($request->filled('bathrooms')) {

                $query->where(
                    'bathrooms',
                    $request->bathrooms
                );
            }

            if ($request->filled('balconies')) {

                $query->where(
                    'balconies',
                    $request->balconies
                );
            }

            if ($request->filled('facing')) {

                $query->where(
                    'facing',
                    $request->facing
                );
            }

            if ($request->filled('floor_number')) {

                $query->where(
                    'floor_number',
                    $request->floor_number
                );
            }

            if ($request->filled('total_floors')) {

                $query->where(
                    'total_floors',
                    $request->total_floors
                );
            }

            if ($request->filled('furnishing')) {

                $query->where(
                    'furnishing',
                    $request->furnishing
                );
            }

            if ($request->filled('construction_year')) {

                $query->where(
                    'construction_year',
                    $request->construction_year
                );
            }

            if ($request->filled('ownership')) {

                $query->where(
                    'ownership',
                    $request->ownership
                );
            }


            /*
            |--------------------------------------------------------------------------
            | COMMERCIAL FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('commercial_type')) {

                $query->where(
                    'commercial_type',
                    $request->commercial_type
                );
            }

            if ($request->filled('business_type')) {

                $query->where(
                    'business_type',
                    'like',
                    '%' . $request->business_type . '%'
                );
            }

            if ($request->filled('washrooms')) {

                $query->where(
                    'washrooms',
                    $request->washrooms
                );
            }

            /*
            | Commercial also uses:
            |
            | floor_number
            | total_floors
            | furnishing
            |
            | These are already filtered above.
            */


            /*
            |--------------------------------------------------------------------------
            | LAND / PLOT FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('plot_area')) {

                $query->where(
                    'plot_area',
                    '>=',
                    $request->plot_area
                );
            }

            if ($request->filled('road_width')) {

                $query->where(
                    'road_width',
                    '>=',
                    $request->road_width
                );
            }

            if ($request->filled('road_width_unit')) {

                $query->where(
                    'road_width_unit',
                    $request->road_width_unit
                );
            }

            if ($request->filled('boundary_wall')) {

                $query->where(
                    'boundary_wall',
                    $request->boundary_wall
                );
            }

            if ($request->filled('land_type')) {

                $query->where(
                    'land_type',
                    'like',
                    '%' . $request->land_type . '%'
                );
            }

            /*
            | Land also uses:
            |
            | facing
            |
            | Already filtered above.
            */


            /*
            |--------------------------------------------------------------------------
            | RENTAL FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('security_deposit')) {

                $query->where(
                    'security_deposit',
                    '<=',
                    $request->security_deposit
                );
            }

            if ($request->filled('available_from')) {

                $query->whereDate(
                    'available_from',
                    '<=',
                    $request->available_from
                );
            }

            if ($request->filled('lease_period')) {

                $query->where(
                    'lease_period',
                    $request->lease_period
                );
            }

            if ($request->filled('lease_period_unit')) {

                $query->where(
                    'lease_period_unit',
                    $request->lease_period_unit
                );
            }

            /*
            | monthly_rent is already filtered above.
            */


            /*
            |--------------------------------------------------------------------------
            | RESALE FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('resale_type')) {
                $query->where(
                    'resale_type',
                    $request->resale_type
                );
            }

            if ($request->filled('bhk')) {
                $query->where(
                    'bhk',
                    $request->bhk
                );
            }

            if ($request->filled('bedrooms')) {
                $query->where(
                    'bedrooms',
                    '>=',
                    $request->bedrooms
                );
            }

            if ($request->filled('bathrooms')) {
                $query->where(
                    'bathrooms',
                    '>=',
                    $request->bathrooms
                );
            }

            if ($request->filled('balconies')) {
                $query->where(
                    'balconies',
                    '>=',
                    $request->balconies
                );
            }

            if ($request->filled('facing')) {
                $query->where(
                    'facing',
                    $request->facing
                );
            }

            if ($request->filled('floor_number')) {
                $query->where(
                    'floor_number',
                    $request->floor_number
                );
            }

            if ($request->filled('total_floors')) {
                $query->where(
                    'total_floors',
                    $request->total_floors
                );
            }

            if ($request->filled('furnishing')) {
                $query->where(
                    'furnishing',
                    $request->furnishing
                );
            }

            if ($request->filled('purchase_year')) {
                $query->where(
                    'purchase_year',
                    $request->purchase_year
                );
            }

            if ($request->filled('property_age')) {
                $query->where(
                    'property_age',
                    '<=',
                    $request->property_age
                );
            }


            /*
            |--------------------------------------------------------------------------
            | NEW PROJECT FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('project_name')) {

                $query->where(
                    'project_name',
                    'like',
                    '%' . $request->project_name . '%'
                );
            }

            if ($request->filled('developer_name')) {

                $query->where(
                    'developer_name',
                    'like',
                    '%' . $request->developer_name . '%'
                );
            }

            if ($request->filled('project_status')) {

                $query->where(
                    'project_status',
                    $request->project_status
                );
            }

            if ($request->filled('launch_date')) {

                $query->whereDate(
                    'launch_date',
                    '>=',
                    $request->launch_date
                );
            }

            if ($request->filled('possession_date')) {

                $query->whereDate(
                    'possession_date',
                    '<=',
                    $request->possession_date
                );
            }

            if ($request->filled('total_units')) {

                $query->where(
                    'total_units',
                    '>=',
                    $request->total_units
                );
            }

            if ($request->filled('available_units')) {

                $query->where(
                    'available_units',
                    '>=',
                    $request->available_units
                );
            }

            if ($request->filled('rera_number')) {

                $query->where(
                    'rera_number',
                    'like',
                    '%' . $request->rera_number . '%'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | COMMON LOCATION FILTERS
            |--------------------------------------------------------------------------
            */

            if ($request->filled('country_id')) {

                $query->where(
                    'country_id',
                    $request->country_id
                );
            }

            if ($request->filled('state_id')) {

                $query->where(
                    'state_id',
                    $request->state_id
                );
            }

            if ($request->filled('city_id')) {

                $query->where(
                    'city_id',
                    $request->city_id
                );
            }

            if ($request->filled('area_id')) {

                $query->where(
                    'area_id',
                    $request->area_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | AMENITIES
            |--------------------------------------------------------------------------
            */

            if ($request->filled('amenities')) {

                $selectedAmenities =
                    $request->input('amenities', []);

                if (
                    is_array($selectedAmenities) &&
                    count($selectedAmenities)
                ) {

                    $query->whereHas(
                        'amenities',
                        function ($q) use ($selectedAmenities) {

                            $q->whereIn(
                                'amenities.id',
                                $selectedAmenities
                            );
                        }
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | GET PROPERTIES
            |--------------------------------------------------------------------------
            */

            $properties = $query
                ->with([
                    'propertyCategory',
                    'country',
                    'state',
                    'city',
                    'area',
                    'amenities',
                    'images',
                ])
                ->latest()
                ->paginate(12);


            /*
            |--------------------------------------------------------------------------
            | RETURN JSON
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'success' => true,

                'filters' => [

                    'property_categories' =>
                        $propertyCategories,

                    'amenities' =>
                        $amenities,

                    'countries' =>
                        $countries,

                    'states' =>
                        $states,

                    'cities' =>
                        $cities,

                    'areas' =>
                        $areas,
                ],

                'properties' =>
                    $properties->items(),

                'pagination' => [

                    'current_page' =>
                        $properties->currentPage(),

                    'last_page' =>
                        $properties->lastPage(),

                    'per_page' =>
                        $properties->perPage(),

                    'total' =>
                        $properties->total(),
                ],
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | NORMAL PAGE LOAD
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.buyer_properties.index'
        );
    }
}