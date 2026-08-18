<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    /**
     * Display a listing of areas.
     */
    public function index()
    {
        $areas = Area::with([
            'country',
            'state',
            'city',
            'creator',
            'updater',
        ])
            ->latest('id')
            ->paginate(10);

        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new area.
     */
    public function create()
    {
        $countries = Country::orderBy('name')
            ->get();

        $states = State::with('country')
            ->where('status', true)
            ->orderBy('name')
            ->get();

        $cities = City::with([
            'country',
            'state',
        ])
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.areas.create', compact(
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * Store a newly created area.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'state_id' => [
                'required',
                'exists:states,id',

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
                'exists:cities,id',

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

            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique('areas', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'city_id',
                            $request->city_id
                        );
                    }),
            ],
        ]);
        $validated['created_by'] = Auth::id();
        Area::create($validated);
        return redirect()->route('areas.index')->with('success', 'Area created successfully.');
    }

    /**
     * Display the specified area.
     */
    public function show(Area $area)
    {
        $area->load([
            'country',
            'state',
            'city',
            'creator',
            'updater',
        ]);

        return view('admin.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified area.
     */
    public function edit(Area $area)
    {
        $countries = Country::orderBy('name')
            ->get();

        $states = State::with('country')
            ->where(function ($query) use ($area) {
                $query->where('status', true)
                    ->orWhere('id', $area->state_id);
            })
            ->where(
                'country_id',
                $area->country_id
            )
            ->orderBy('name')
            ->get();

        $cities = City::with([
            'country',
            'state',
        ])
            ->where(function ($query) use ($area) {
                $query->where('status', true)
                    ->orWhere('id', $area->city_id);
            })
            ->where(
                'country_id',
                $area->country_id
            )
            ->where(
                'state_id',
                $area->state_id
            )
            ->orderBy('name')
            ->get();

        return view('admin.areas.edit', compact(
            'area',
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * Update the specified area.
     */
    public function update(Request $request, Area $area)
    {
        $validated = $request->validate([
            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'state_id' => [
                'required',
                'exists:states,id',

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
                'exists:cities,id',

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

            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique('areas', 'name')
                    ->ignore($area->id)
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'city_id',
                            $request->city_id
                        );
                    }),
            ],
        ]);

        $validated['updated_by'] = Auth::id();

        $area->update($validated);

        return redirect()
            ->route('areas.index')
            ->with(
                'success',
                'Area updated successfully.'
            );
    }

    /**
     * Remove the specified area.
     */
    public function destroy(Area $area)
    {
        $area->update(['status' => 0,]);
        return redirect()->route('areas.index')->with('success','Area deleted successfully.');
    }
}
