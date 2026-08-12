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
            | Filter Master Data
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
                    'name'
                ]);

            $cities = City::orderBy('name')
                ->get([
                    'id',
                    'name'
                ]);

            $areas = Area::orderBy('name')
                ->get([
                    'id',
                    'name'
                ]);


            /*
            |--------------------------------------------------------------------------
            | Property Query
            |--------------------------------------------------------------------------
            |
            | ONLY:
            |
            | approval = 1
            | status   = 1
            |
            */

            $query = Property::query()
                ->where('approval', 1)
                ->where('status', 1);


            /*
            |--------------------------------------------------------------------------
            | Purpose
            |--------------------------------------------------------------------------
            */

            if ($request->filled('purpose')) {

                $query->where(
                    'purpose',
                    $request->purpose
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Property Category
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
            | Country
            |--------------------------------------------------------------------------
            */

            if ($request->filled('country_id')) {

                $query->where(
                    'country_id',
                    $request->country_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | State
            |--------------------------------------------------------------------------
            */

            if ($request->filled('state_id')) {

                $query->where(
                    'state_id',
                    $request->state_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | City
            |--------------------------------------------------------------------------
            */

            if ($request->filled('city_id')) {

                $query->where(
                    'city_id',
                    $request->city_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Area
            |--------------------------------------------------------------------------
            */

            if ($request->filled('area_id')) {

                $query->where(
                    'area_id',
                    $request->area_id
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Amenities
            |--------------------------------------------------------------------------
            */

            if ($request->filled('amenities')) {

                $selectedAmenities = $request->input(
                    'amenities',
                    []
                );

                if (is_array($selectedAmenities) && count($selectedAmenities)) {

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
            | Get Properties
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
            | Return JSON
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'success' => true,

                'filters' => [

                    'property_categories' => $propertyCategories,

                    'amenities' => $amenities,

                    'countries' => $countries,

                    'states' => $states,

                    'cities' => $cities,

                    'areas' => $areas,
                ],

                'properties' => $properties->items(),

                'pagination' => [

                    'current_page' => $properties->currentPage(),

                    'last_page' => $properties->lastPage(),

                    'per_page' => $properties->perPage(),

                    'total' => $properties->total(),

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