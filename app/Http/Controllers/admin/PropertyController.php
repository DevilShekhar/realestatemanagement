<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\PropertyCategory;
use App\Models\PropertyImage;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    /**
     * Display a listing of properties.
     */
    public function index()
    {
        $user = Auth::user();

        $query = Property::with([
            'propertyCategory',
            'country',
            'state',
            'city',
            'area',
            'creator',
            'updater',
            'propertyArea'
        ]);

        // Only Active (1) and Inactive (0) properties
        $query->whereIn('status', [0, 1]);
        // Super Admin & Admin → Show all active/inactive properties
        if ($user->hasAnyRole(['super-admin', 'admin'])) {

            // No additional restriction

        }
        // Seller → Show only their own active/inactive properties
        elseif ($user->hasRole('seller')) {

            $query->where('created_by', $user->id);

        }
        // Other roles → Show no properties
        else {

            $query->whereRaw('1 = 0');
        }

        $properties = $query
            ->latest('id')
            ->get();

        return view(
            'admin.properties.index',
            compact('properties')
        );
    }
    public function soldOutProperty()
    {
        $user = Auth::user();

        $query = Property::with([
            'propertyCategory',
            'country',
            'state',
            'city',
            'area',
            'creator',
            'updater',
        ]);

        // Only Sold properties
        $query->where('status', 2);

        // Super Admin & Admin → Show all sold properties
        if ($user->hasAnyRole(['super-admin', 'admin'])) {

            // No restriction

        }
        // Seller → Show only their own sold properties
        elseif ($user->hasRole('seller')) {

            $query->where('created_by', $user->id);

        }
        // Other roles → Show no properties
        else {

            $query->whereRaw('1 = 0');
        }

        $properties = $query
            ->latest('id')
            ->get();

        return view(
            'admin.properties.sold-out',
            compact('properties')
        );
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        $categories = PropertyCategory::where('status', true)
            ->orderBy('name')
            ->get();

        $countries = Country::where('status', true)
            ->orderBy('name')
            ->get();

        $states = State::where('status', true)
            ->with('country')
            ->orderBy('name')
            ->get();

        $cities = City::where('status', true)
            ->with([
                'country',
                'state',
            ])
            ->orderBy('name')
            ->get();

        $areas = Area::with([
            'country',
            'state',
            'city',
        ])
            ->orderBy('name')
            ->get();

        return view(
            'admin.properties.create',
            compact(
                'categories',
                'countries',
                'states',
                'cities',
                'areas'
            )
        );
    }

    /**
     * Store a newly created property.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | PROPERTY CATEGORY
            |--------------------------------------------------------------------------
            */

            'property_category_id' => [
                'required',
                'exists:property_categories,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | LOCATION
            |--------------------------------------------------------------------------
            */

            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'state_id' => [
                'required',
                Rule::exists('states', 'id')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'country_id',
                            $request->country_id
                        );
                    }),
            ],

            'city_id' => [
            'required',
            Rule::exists('cities', 'id')
                    ->where(function ($query) use ($request) {
                        return $query
                            ->where(
                                'country_id',
                                $request->country_id
                            )
                            ->where(
                                'state_id',
                                $request->state_id
                            );
                    }),
        ],

            'area_id' => [
            'required',
            Rule::exists('areas', 'id')
                    ->where(function ($query) use ($request) {
                        return $query
                            ->where(
                                'country_id',
                                $request->country_id
                            )
                            ->where(
                                'state_id',
                                $request->state_id
                            )
                            ->where(
                                'city_id',
                                $request->city_id
                            );
                    }),
        ],

            /*
        |--------------------------------------------------------------------------
        | BASIC PROPERTY
        |--------------------------------------------------------------------------
        */

            'title' => [
            'required',
            'string',
            'max:255',
        ],

            'purpose' => [
            'required',
            'in:sale,rent',
        ],

            'description' => [
            'nullable',
            'string',
        ],

            'address' => [
            'nullable',
            'string',
        ],

            'pincode' => [
            'nullable',
            'string',
            'max:20',
        ],

            'landmark' => [
            'nullable',
            'string',
            'max:255',
        ],

            /*
        |--------------------------------------------------------------------------
        | PRICE
        |--------------------------------------------------------------------------
        */

            'price' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'monthly_rent' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'security_deposit' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            /*
        |--------------------------------------------------------------------------
        | AVAILABILITY
        |--------------------------------------------------------------------------
        */

            'available_from' => [
            'nullable',
            'date',
        ],

            'lease_period' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'lease_period_unit' => [
            'nullable',
            'string',
            'max:50',
        ],

            /*
        |--------------------------------------------------------------------------
        | RESIDENTIAL
        |--------------------------------------------------------------------------
        */

            'bedrooms' => [
            'nullable',
            'integer',
            'min:0',
        ],
        'residential_type' => [
            'nullable',
            'string',
            'max:100',
        ],

            'bhk' => [
            'nullable',
            'string',
            'max:50',
        ],

            'bathrooms' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'balconies' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'parking' => [
            'nullable',
            'string',
            'max:100',
        ],
        'car_parking' => [
            'nullable',
            'integer',
            'min:0',
        ],

        'bike_parking' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'facing' => [
            'nullable',
            'string',
            'max:50',
        ],

            'floor_number' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'total_floors' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'furnishing' => [
            'nullable',
            'string',
            'max:100',
        ],

            /*
        |--------------------------------------------------------------------------
        | PROPERTY DETAILS
        |--------------------------------------------------------------------------
        */

            'construction_year' => [
            'nullable',
            'integer',
            'min:1900',
            'max:'.date('Y'),
        ],

            'ownership' => [
            'nullable',
            'string',
            'max:100',
        ],
        'resale_type' => 'nullable|in:Resale Flats,Resale Apartments,Resale Houses,Resale Villas,Resale Office Spaces,Resale Shops,Other Resale Properties',

            'purchase_year' => [
            'nullable',
            'integer',
            'min:1900',
            'max:'.date('Y'),
        ],

            'property_age' => [
            'nullable',
            'integer',
            'min:0',
        ],

            /*
        |--------------------------------------------------------------------------
        | AREA
        |--------------------------------------------------------------------------
        */

            'area' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'area_unit' => [
            'nullable',
            'string',
            'max:50',
        ],

            'built_up_area' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'carpet_area' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'plot_area' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            /*
        |--------------------------------------------------------------------------
        | PROJECT
        |--------------------------------------------------------------------------
        */

            'project_name' => [
            'nullable',
            'string',
            'max:255',
        ],

            'developer_name' => [
            'nullable',
            'string',
            'max:255',
        ],

            'project_status' => [
            'nullable',
            'string',
            'max:100',
        ],

            'launch_date' => [
            'nullable',
            'date',
        ],

            'possession_date' => [
            'nullable',
            'date',
        ],

            'total_units' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'available_units' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'rera_number' => [
            'nullable',
            'string',
            'max:100',
        ],

            /*
        |--------------------------------------------------------------------------
        | COMMERCIAL
        |--------------------------------------------------------------------------
        */

            'washrooms' => [
            'nullable',
            'integer',
            'min:0',
        ],

            'commercial_type' => [
            'nullable',
            'string',
            'max:100',
        ],
        'commercial_budget' => 'nullable|numeric|min:0',

            'business_type' => [
            'nullable',
            'string',
            'max:100',
        ],

            /*
        |--------------------------------------------------------------------------
        | PLOT / LAND
        |--------------------------------------------------------------------------
        */

            'road_width' => [
            'nullable',
            'numeric',
            'min:0',
        ],

            'road_width_unit' => [
            'nullable',
            'string',
            'max:50',
        ],

            'boundary_wall' => [
            'nullable',
            'string',
            'max:100',
        ],

            'land_type' => [
            'nullable',
            'string',
            'max:100',
        ],

            /*
        |--------------------------------------------------------------------------
        | LOCATION COORDINATES
        |--------------------------------------------------------------------------
        */

            'latitude' => [
            'nullable',
            'numeric',
            'between:-90,90',
        ],

            'longitude' => [
            'nullable',
            'numeric',
            'between:-180,180',
        ],

            'additional_notes' => [
            'nullable',
            'string',
        ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | GENERATE SLUG
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        /*
        |--------------------------------------------------------------------------
        | PROPERTY CODE
        |--------------------------------------------------------------------------
        */

        $validated['property_code'] = $this->generatePropertyCode();

        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        $validated['status'] = 1;

        /*
        |--------------------------------------------------------------------------
        | CREATED BY
        |--------------------------------------------------------------------------
        */

        $validated['created_by'] = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | CREATE PROPERTY
        |--------------------------------------------------------------------------
        */

        Property::create($validated);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('properties.index')
            ->with(
                'success',
                'Property created successfully.'
            );
    }

    private function generatePropertyCode()
    {
        do {
            $code = 'PROP-'.now()->format('Ymd').'-'.strtoupper(
                substr(bin2hex(random_bytes(4)), 0, 6)
            );
        } while (
            Property::where('property_code', $code)->exists()
        );

        return $code;
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        $property->load([
            'propertyCategory',
            'country',
            'state',
            'city',
            'propertyArea',
            'creator',
            'updater',
            'images',
            'enquiries.buyer',
            'amenities',
        ]);

        $amenities = Amenity::where('status', 1)
            ->orderBy('name')
            ->get();

        return view(
            'admin.properties.show',
            compact('property', 'amenities')
        );
    }

    /**
     * Show the form for editing the specified property.
     */
    public function edit(Property $property)
    {
        $categories = PropertyCategory::where('status', true)->orderBy('name')->get();
        $countries = Country::where('status', true)->orderBy('name')->get();
        $states = State::where('status', true)->with('country')->orderBy('name')->get();
        $cities = City::where('status', true)->with('state')->orderBy('name')->get();
        $areas = Area::with(['country', 'state', 'city'])->orderBy('name')->get();

        return view('admin.properties.edit', compact(
            'property', 'categories', 'countries', 'states', 'cities', 'areas'
        ));
    }

    /**
     * Update the specified property.
     */
    public function update(Request $request, Property $property)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Property Category
            |--------------------------------------------------------------------------
            */

            'property_category_id' => [
                'required',
                'exists:property_categories,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Country
            |--------------------------------------------------------------------------
            */

            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | State
            |--------------------------------------------------------------------------
            */

            'state_id' => [
                'required',

                Rule::exists('states', 'id')
                    ->where(function ($query) use ($request) {

                        return $query->where(
                            'country_id',
                            $request->country_id
                        );

                    }),
            ],

            /*
            |--------------------------------------------------------------------------
            | City
            |--------------------------------------------------------------------------
            | City table has state_id.
            | City table DOES NOT have country_id.
            |--------------------------------------------------------------------------
            */

            'city_id' => [
                'required',

                Rule::exists('cities', 'id')
                    ->where(function ($query) use ($request) {

                        return $query->where(
                            'state_id',
                            $request->state_id
                        );

                    }),
            ],

            /*
            |--------------------------------------------------------------------------
            | Area
            |--------------------------------------------------------------------------
            | Area has country_id, state_id and city_id.
            |--------------------------------------------------------------------------
            */

            'area_id' => [
                'required',

                Rule::exists('areas', 'id')
                    ->where(function ($query) use ($request) {

                        return $query
                            ->where(
                                'country_id',
                                $request->country_id
                            )
                            ->where(
                                'state_id',
                                $request->state_id
                            )
                            ->where(
                                'city_id',
                                $request->city_id
                            );

                    }),
            ],

            /*
            |--------------------------------------------------------------------------
            | Property Title
            |--------------------------------------------------------------------------
            */

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Purpose
            |--------------------------------------------------------------------------
            */

            'purpose' => [
                'nullable',
                'string',
                'max:50',
            ],

            /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            'description' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Address
            |--------------------------------------------------------------------------
            */

            'address' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Landmark
            |--------------------------------------------------------------------------
            */

            'landmark' => [
                'nullable',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Pincode
            |--------------------------------------------------------------------------
            */

            'pincode' => [
                'nullable',
                'string',
                'max:20',
            ],

            /*
            |--------------------------------------------------------------------------
            | Price
            |--------------------------------------------------------------------------
            */

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Property Area
            |--------------------------------------------------------------------------
            */

            'area' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Area Unit
            |--------------------------------------------------------------------------
            */

            'area_unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            /*
            |--------------------------------------------------------------------------
            | Built-up Area
            |--------------------------------------------------------------------------
            */

            'built_up_area' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Carpet Area
            |--------------------------------------------------------------------------
            */

            'carpet_area' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Parking
            |--------------------------------------------------------------------------
            */

            'parking' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'car_parking' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'bike_parking' => [
                'nullable',
                'integer',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Residential Fields
            |--------------------------------------------------------------------------
            */
            'residential_type' => [
                'nullable',
                'string',
                'max:100',
            ],

            'bhk' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'bedrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'bathrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'balconies' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'facing' => [
                'nullable',
                'string',
                'max:50',
            ],

            'floor_number' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'total_floors' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'furnishing' => [
                'nullable',
                'string',
                'max:100',
            ],

            'construction_year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:'.date('Y'),
            ],

            /*
            |--------------------------------------------------------------------------
            | Commercial Fields
            |--------------------------------------------------------------------------
            */

            'commercial_type' => [
                'nullable',
                'string',
                'max:100',
            ],
            'commercial_budget' => 'nullable|numeric|min:0',

            'business_type' => [
                'nullable',
                'string',
                'max:255',
            ],

            'washrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | Land / Plot Fields
            |--------------------------------------------------------------------------
            */

            'plot_area' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'road_width' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'road_width_unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            'boundary_wall' => [
                'nullable',
                'boolean',
            ],

            'land_type' => [
                'nullable',
                'string',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | Rental Fields
            |--------------------------------------------------------------------------
            */

            'monthly_rent' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'security_deposit' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'available_from' => [
                'nullable',
                'date',
            ],

            'lease_period' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'lease_period_unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            /*
            |--------------------------------------------------------------------------
            | Resale Fields
            |--------------------------------------------------------------------------
            */
             'resale_type' => 'nullable|in:Resale Flats,Resale Apartments,Resale Houses,Resale Villas,Resale Office Spaces,Resale Shops,Other Resale Properties',

            'purchase_year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:'.date('Y'),
            ],

            'property_age' => [
                'nullable',
                'integer',
                'min:0',
            ],

            /*
            |--------------------------------------------------------------------------
            | New Project Fields
            |--------------------------------------------------------------------------
            */

            'project_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'developer_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'project_status' => [
                'nullable',
                'string',
                'max:100',
            ],

            'launch_date' => [
                'nullable',
                'date',
            ],

            'possession_date' => [
                'nullable',
                'date',
            ],

            'total_units' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'available_units' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'rera_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Map Location
            |--------------------------------------------------------------------------
            */

            'latitude' => [
                'nullable',
                'numeric',
            ],

            'longitude' => [
                'nullable',
                'numeric',
            ],

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            'status' => 'required|in:0,1,2',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        if ($property->title !== $validated['title']) {

            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $property->id
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Updated By
        |--------------------------------------------------------------------------
        */

        $validated['updated_by'] = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | Update Property
        |--------------------------------------------------------------------------
        */

        $property->update($validated);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('properties.index')
            ->with(
                'success',
                'Property updated successfully.'
            );
    }

    /**
     * Remove the specified property.
     */
    public function destroy(Property $property)
    {
        $property->update(['status' => 0,]);
        return redirect()->route('properties.index')->with('success','Property deleted successfully.');
    }

    /**
     * Generate a unique property slug.
     */
    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($title);

        if ($slug === '') {
            $slug = 'property';
        }

        $originalSlug = $slug;
        $counter = 1;

        while (
            Property::where('slug', $slug)
                ->when(
                    $ignoreId,
                    function ($query) use ($ignoreId) {
                        $query->where('id', '!=', $ignoreId);
                    }
                )
                ->exists()
        ) {
            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    public function updateAmenities(Request $request, Property $property)
    {
        $validated = $request->validate([
            'amenities' => ['nullable', 'array'],
            'amenities.*' => [
                'integer',
                'exists:amenities,id',
            ],
        ]);

        $amenityIds = $validated['amenities'] ?? [];

        $syncData = [];

        foreach ($amenityIds as $amenityId) {

            $syncData[$amenityId] = [

                'created_by' => Auth::id(),

                'updated_by' => Auth::id(),

            ];

        }

        $property->amenities()->sync($syncData);

        return redirect()
            ->route('properties.show', $property->id)
            ->with(
                'success',
                'Property amenities updated successfully.'
            );
    }

    public function storeImages(Request $request, Property $property)
    {
        $validated = $request->validate([
            'images' => [
                'required',
                'array',
                'min:1',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        foreach ($validated['images'] as $image) {

            /*
            |--------------------------------------------------------------------------
            | Store Image
            |--------------------------------------------------------------------------
            | Stored in:
            | storage/app/public/properties/{property_id}
            */

            $path = $image->store(
                'properties/'.$property->id,
                'public'
            );

            /*
            |--------------------------------------------------------------------------
            | Save Image Record
            |--------------------------------------------------------------------------
            */

            PropertyImage::create([
                'property_id' => $property->id,

                'image' => $path,

                'title' => pathinfo(
                    $image->getClientOriginalName(),
                    PATHINFO_FILENAME
                ),

                'is_primary' => false,

                'created_by' => Auth::id(),

                'updated_by' => Auth::id(),
            ]);
        }

        return redirect()
            ->route('properties.show', $property->id)
            ->with(
                'success',
                'Property images uploaded successfully.'
            );
    }

    public function approve(Property $property)
    {
        $property->update([
            'approval' => 1,
            'updated_by' => Auth::id(),
        ]);

        return redirect()
            ->route('properties.show', $property->id)
            ->with(
                'success',
                'Property approved successfully.'
            );
    }

    public function updateImages(Request $request, Property $property)
    {
        $request->validate([
            'delete_images' => 'nullable|string',
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        // Delete images
        if ($request->delete_images) {
            $deleteIds = json_decode($request->delete_images, true);

            if (is_array($deleteIds) && count($deleteIds) > 0) {

                $images = $property->images()
                    ->whereIn('id', $deleteIds)
                    ->get();

                foreach ($images as $image) {

                    if (Storage::disk('public')->exists($image->image)) {
                        Storage::disk('public')->delete($image->image);
                    }

                    $image->delete();
                }
            }
        }

        // Upload new images
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $file->store('properties/'.$property->id, 'public');
                $property->images()->create([
                    'image' => $path,
                    'title' => $property->title,
                    'property_id' => $property->id,
                ]);
            }
        }

        return redirect()->route('properties.show', $property->id)
            ->with('success', 'Property images updated successfully!');
    }
    public function storeEnquiry(Request $request, $propertyId)
    {
        $request->validate([
            'property_available' => 'required|in:yes,no,maybe',
            'enquiry_type' => 'nullable|in:general,site_visit,price,documentation,other',
            'note' => 'required|string|max:2000',
            'follow_up_required' => 'required|in:yes,no',
        ]);

        $property = Property::findOrFail($propertyId);

        // Check if buyer has already enquired for this property
        $alreadyEnquired = PropertyEnquiry::where('property_id', $property->id)
            ->where('buyer_id', auth()->id())
            ->exists();

        if ($alreadyEnquired) {
            return back()->with(
                'error',
                'You have already submitted an enquiry for this property.'
            );
        }

        // Create enquiry
        PropertyEnquiry::create([
            'property_id' => $property->id,
            'buyer_id' => auth()->id(),
            'property_available' => $request->property_available,
            'enquiry_type' => $request->enquiry_type,
            'note' => $request->note,
            'follow_up_required' => $request->follow_up_required,
            'status' => 'Pending',
        ]);

        return back()->with(
            'success',
            'Buyer enquiry submitted successfully.'
        );
    }
}
