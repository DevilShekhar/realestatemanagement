<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use App\Models\Contact;
use App\Models\PropertyEnquiry;

class DashboardController extends Controller
{
    /**
     * Dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = null;
        if ($user->roles && $user->roles->count()) {
            $role = strtolower($user->roles->first()->name);
        }         
        $totalUsers = User::count();
        $propertyQuery = Property::query();
        $totalProperties = (clone $propertyQuery)->count();
        $activeProperties = (clone $propertyQuery)->where('status', 1)->count();
        $inactiveProperties = (clone $propertyQuery)->where('status', 0)->count();
        $soldProperties = (clone $propertyQuery)->where('status', 2)->count();
        $totalCategories = PropertyCategory::count();
        $totalAmenities = Amenity::count();
        $totalCountries = Country::count();
        $totalStates = State::count();
        $totalCities = City::count();
        $totalAreas = Area::count();
        $totalContacts = Contact::count();
        $recentContacts = Contact::latest()->get();      
        $totalPropertyEnquiries = 0;
        $recentEnquiries = collect();
        $totalPropertyEnquiries = PropertyEnquiry::count();
        $recentEnquiries = PropertyEnquiry::with(['property','buyer',])->latest('created_at')->get();
        $recentPropertyQuery = Property::latest();
        $sellerProperties = 0;
        $sellerActiveProperties = 0;
        $sellerInactiveProperties = 0;
        $sellerSoldProperties = 0;

        if ($role === 'seller') {
            $sellerPropertyQuery = Property::where('created_by', $user->id);

            $sellerProperties = (clone $sellerPropertyQuery)->count();
            $sellerActiveProperties = (clone $sellerPropertyQuery)->where('status', 1)->count();
            $sellerInactiveProperties = (clone $sellerPropertyQuery)->where('status', 0)->count();
            $sellerSoldProperties = (clone $sellerPropertyQuery)->where('status', 2)->count();
        }   
        $buyerEnquiries = 0;
        if ($role === 'buyer') {
            $buyerEnquiries = PropertyEnquiry::where('buyer_id', $user->id)->count();
        }   
        $recentProperties = $recentPropertyQuery->get();
        return view('admin.dashboard', compact(
            'user',
            'role',
            'totalUsers',
            'totalProperties',
            'activeProperties',
            'inactiveProperties',
            'soldProperties',
            'totalCategories',
            'totalAmenities',
            'totalCountries',
            'totalStates',
            'totalCities',
            'totalAreas',
            'totalContacts',
            'totalPropertyEnquiries',
            'recentProperties',
            'recentEnquiries',
            'recentContacts',
            'sellerProperties',
            'sellerActiveProperties',
            'sellerInactiveProperties',
            'sellerSoldProperties',
            'buyerEnquiries'
        ));
    }
}