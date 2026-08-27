<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StateController extends Controller
{
    /**
     * Display a listing of states.
     */
    public function index(Request $request)
    {
        $states = State::with('country')
            ->latest('id')
            ->get();

        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new state.
     */
    public function create()
    {
        $countries = Country::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.states.create', compact('countries'));
    }

    /**
     * Store a newly created state.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => ['required','exists:countries,id',],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('states', 'name')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'country_id',
                            $request->country_id
                        );
                    }),
            ],
        ]);
        $validated['status'] = 1;
        $validated['created_by'] = Auth::id();
        State::create($validated);
        return redirect()->route('states.index')->with('success', 'State created successfully.');
    }

    /**
     * Display the specified state.
     */
    public function show(State $state)
    {
        $state->load([
            'country',
            'creator',
            'updater',
        ]);

        return view('admin.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified state.
     */
    public function edit(State $state)
    {
        $countries = Country::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.states.edit', compact(
            'state',
            'countries'
        ));
    }

    /**
     * Update the specified state.
     */
    public function update(Request $request, State $state)
    {
        $validated = $request->validate([
            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('states', 'name')
                    ->ignore($state->id)
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'country_id',
                            $request->country_id
                        );
                    }),
            ],

            'status' => [
                'required',
                'boolean',
            ],
        ]);

        $validated['updated_by'] = Auth::id();

        $state->update($validated);

        return redirect()
            ->route('states.index')
            ->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified state.
     */
    public function destroy(State $state)
    {
        // Prevent deleting state if cities exist
        if ($state->cities()->exists()) {
            return redirect()->route('states.index')->with('error', 'State cannot be deleted because cities are associated with it.');
        }
        $state->update(['status' => 0,]);
        return redirect()->route('states.index')->with('success', 'State deleted successfully.');
    }
}