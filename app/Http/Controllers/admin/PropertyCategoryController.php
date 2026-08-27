<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PropertyCategory::with(['createdBy', 'updatedBy'])
            ->latest()
            ->get();

        return view('admin.property_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:property_categories,name',
            ]             
        ]);

        PropertyCategory::create([
            'name' => $validated['name'],
            'status' => 1,
            'created_by' => auth()->id(),            
        ]);

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(PropertyCategory $propertyCategory)
    {
        return view(
            'admin.property_categories.show',
            compact('propertyCategory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyCategory $propertyCategory)
    {
        return view(
            'admin.property_categories.edit',
            compact('propertyCategory')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyCategory $propertyCategory)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('property_categories', 'name')
                    ->ignore($propertyCategory->id),
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ]);

        $propertyCategory->update([
            'name' => $validated['name'],
            'status' => $validated['status'],
            'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyCategory $propertyCategory)
    {
        // Prevent deleting category if properties are using it
        if ($propertyCategory->properties()->exists()) {
            return redirect()
                ->route('property-categories.index')
                ->with(
                    'error',
                    'This property category cannot be deleted because it is already assigned to a property.'
                );
        }

        $propertyCategory->update(['status' => 0,]);

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category deleted successfully.');
    }
}
