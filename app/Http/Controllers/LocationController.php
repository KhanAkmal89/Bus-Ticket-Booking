<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('pages.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('pages.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:locations|max:255',
        ]);

        Location::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully!');
    }

    public function edit($id)
    {
        $location = Location::find($id);
        return view('pages.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:locations|max:255',
            'price' => 'required',
        ]);

        $location = Location::find($id);
        $location->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }

    public function destroy($id)
    {
        Location::destroy($id);
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
}
