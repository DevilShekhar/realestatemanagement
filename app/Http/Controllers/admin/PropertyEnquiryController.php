<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;

class PropertyEnquiryController extends Controller
{
    /**
     * Display all property enquiries.
     */
    public function index()
    {
        $enquiries = PropertyEnquiry::with([
            'property',
            'buyer',
        ])->latest()->paginate(20);

        return view('admin.property-enquiries.index',compact('enquiries'));
    }
}