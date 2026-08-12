<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmenityController extends Controller
{
    /**
     * Display a listing of amenities.
     */
    public function index()
    {
        $amenities = Amenity::with([
            'creator:id,name',
            'updater:id,name',
        ])
            ->latest('id')
            ->paginate(10);

        return view('admin.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new amenity.
     */
    public function create()
    {
        return view('admin.amenities.create');
    }

    /**
     * Store a newly created amenity.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:191','unique:amenities,name',],
        ]);
        $validated['status'] = 1;
        $validated['created_by'] = Auth::id();
        Amenity::create($validated);
        return redirect()->route('amenities.index')->with('success', 'Amenity created successfully.');
    }

    /**
     * Display the specified amenity.
     */
    public function show(Amenity $amenity)
    {
        $amenity->load([
            'creator:id,name',
            'updater:id,name',
        ]);

        return view('admin.amenities.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified amenity.
     */
    public function edit(Amenity $amenity)
    {
        return view('admin.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified amenity.
     */
    public function update(Request $request, Amenity $amenity)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:191',
                'unique:amenities,name,' . $amenity->id,
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ]);

        $validated['updated_by'] = Auth::id();
        $amenity->update($validated);
        return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');
    }

    /**
     * Delete the specified amenity.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
    }
}