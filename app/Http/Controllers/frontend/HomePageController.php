<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HomePageController extends Controller
{
    /**
     * Display the frontend home page.
     */
    public function index()
    {
        $properties = Property::with([
            'propertyCategory',
            'country',
            'state',
            'city',
            'propertyArea',
            'images',
        ])
        ->where('status', Property::STATUS_ACTIVE)
        ->latest()
        ->get();

        return view('frontend.home.index', compact('properties'));
    }
}