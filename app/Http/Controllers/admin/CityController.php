<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of cities.
     */
    public function index()
    {
        $cities = City::with('state')
            ->latest('id')
            ->paginate(10);

        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new city.
     */
    public function create()
    {
        $countries = Country::where('status', true)
            ->orderBy('name')
            ->get();

        $states = State::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.cities.create', compact(
            'countries',
            'states'
        ));
    }

    /**
     * Store a newly created city.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['country_id' => ['required','exists:countries,id',],
             'state_id' => ['required','exists:states,id',],
             'name' => ['required','string','max:255',
                Rule::unique('cities', 'name')->where(function ($query) use ($request) {
                    return $query->where('state_id', $request->state_id);
                }),
            ],
        ]);
        $validated['status'] = 1;
        $validated['created_by'] = Auth::id();
        City::create($validated);
        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }


    /**
     * Display the specified city.
     */
    public function show(City $city)
    {
        $city->load([
            'state',
            'creator',
            'updater',
        ]);

        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified city.
     */
    public function edit(City $city)
    {
        $countries = Country::where('status', true)->orWhere('id', $city->country_id)->orderBy('name')->get();
        $states = State::where(function ($query) use ($city) {
            $query->where('status', true)->orWhere('id', $city->state_id);
        })->where('country_id', $city->country_id)->orderBy('name')->get();
        return view('admin.cities.edit', compact('city','countries','states'));
    }

    /**
     * Update the specified city.
     */
    public function update(Request $request, City $city)
    {
        $validated = $request->validate(['country_id' => ['required','exists:countries,id',],
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cities', 'name')
                    ->ignore($city->id)
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'state_id',
                            $request->state_id
                        );
                    }),
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ]);
        $validated['updated_by'] = Auth::id();
        $city->update($validated);
        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified city.
     */
    public function destroy(City $city)
    {
        // Prevent deleting city if areas exist
        if ($city->areas()->exists()) {
            return redirect()
                ->route('cities.index')
                ->with(
                    'error',
                    'City cannot be deleted because areas are associated with it.'
                );
        }

        $city->update(['status' => 0,]);

        return redirect()
            ->route('cities.index')
            ->with('success', 'City deleted successfully.');
    }
}