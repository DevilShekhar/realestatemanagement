<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use Illuminate\Http\Request;

class PropertyListingController extends Controller
{
    /**
     * Display all active properties / filter properties.
     */
    public function index(Request $request)
    {
        $categories = PropertyCategory::where('status', 1)->orderBy('name')->get();
        $states = State::where('status', 1)->orderBy('name')->get();
        $cities = City::where('status', 1)->orderBy('name')->get();
        $areas = Area::orderBy('name')->get();
        $query = Property::with(['propertyCategory','country','state','city','propertyArea','images',])->where('status',Property::STATUS_ACTIVE);
        if ($request->filled('category_id')) {
            $query->where(
                'property_category_id',
                $request->category_id
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
        if ($request->filled('min_price')) {
            $query->where(
                'price',
                '>=',
                $request->min_price
            );
        }
        if ($request->filled('max_price')) {
            $query->where(
                'price',
                '<=',
                $request->max_price
            );
        }
        $properties = $query->latest()->get();
        if ($request->ajax()) {
            $html = '';
            foreach ($properties as $property) {
                $image = $property->images->first();
                $imageUrl = $image ? asset('storage/' . $image->image) : asset('images/property-placeholder.jpg');
                $category = $property->propertyCategory->name ?? 'Property';
                $location = collect([
                    $property->propertyArea->name ?? null,
                    $property->city->name ?? null,
                    $property->state->name ?? null,
                ])->filter()->implode(', '); $priceHtml = '';
                if ($property->price) {
                    $priceHtml = '
                        <div class="property-price">
                            ₹' . number_format($property->price) . '
                        </div>
                    ';
                } elseif ($property->monthly_rent) {
                    $priceHtml = '
                        <div class="property-price">
                            ₹' . number_format($property->monthly_rent) . '
                            <span class="property-price-rent">
                                / Month
                            </span>
                        </div>
                    ';
                }
                $button = route(
                    'properties.show',
                    $property->id
                );
                $html .= '
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="property-card">
                            <div class="property-card-image">
                                <img src="' . e($imageUrl) . '"   alt="' . e($property->title) . '" >
                                <span class="property-category">
                                    ' . e($category) . '
                                </span>
                            </div>
                            <div class="property-card-body">
                                ' . $priceHtml . '
                                <h4 class="property-title">
                                    ' . e($property->title) . '
                                </h4>
                                <p class="property-location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    ' . e(
                                        $location ?: 'Location not available'
                                    ) . '
                                </p>
                                <div class="property-features">
                                    <span class="property-feature">
                                        <i class="bi bi-rulers"></i>
                                        ' . e($property->area ?? '-') . '
                                        ' . e($property->area_unit ?? 'sq.ft') . '
                                    </span>
                                    <span class="property-feature">
                                        <i class="bi bi-door-open"></i>
                                        ' . e($property->bedrooms ?? '-') . '
                                        Beds
                                    </span>
                                    <span class="property-feature">
                                        <i class="bi bi-droplet-fill"></i>
                                        ' . e($property->bathrooms ?? '-') . '
                                        Baths
                                    </span>
                                    ' . (
                                        ($property->parking || $property->car_parking)
                                            ? '
                                                <span class="property-feature">
                                                    <i class="bi bi-car-front-fill"></i>
                                                    Parking
                                                </span>
                                            '
                                            : ''
                                    ) . '
                                </div>
                                <div class="property-card-footer">
                                    <span class="property-code">
                                        ' . e(
                                            $property->property_code
                                                ?? 'Property'
                                        ) . '
                                    </span>
                                    <a  href="' . e($button) . '" class="property-view-btn">
                                        View Details
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
            if (empty($html)) {
                $html = '
                    <div class="col-12">
                        <div class="no-property">
                            <i class="bi bi-house-x"></i>
                            <h4>No Properties Found</h4>
                            <p>
                                Try changing your filters.
                            </p>
                        </div>
                    </div>
                ';
            }
            return response()->json(['html' => $html,'count' => $properties->count(),]);
        }
        return view('frontend.properties.index', compact('properties','categories','states','cities','areas')
        );
    }
}