<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of countries.
     */
    public function index(): View
    {
        $countries = Country::with([
            'creator:id,name',
            'updater:id,name',
        ])
            ->latest('id')
            ->paginate(10);

        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new country.
     */
    public function create(): View
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created country.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:191',
                'unique:countries,name',
            ],
        ]);
        $validated['status'] = 1;
        $validated['created_by'] = Auth::id();       
        Country::create($validated);
        return redirect()->route('countries.index')->with('success', 'Country created successfully.');
    }

    /**
     * Display the specified country.
     */
    public function show(Country $country): View
    {
        $country->load([
            'creator:id,name',
            'updater:id,name',
        ]);

        return view('admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified country.
     */
    public function edit(Country $country): View
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified country.
     */
    public function update(
        Request $request,
        Country $country
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:191',
                'unique:countries,name,' . $country->id,
            ],

            'status' => [
                'required',
                'boolean',
            ],
        ]);

        $validated['updated_by'] = Auth::id();

        $country->update($validated);

        return redirect()
            ->route('countries.index')
            ->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified country.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->update(['status' => 0,]);
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
    }
}