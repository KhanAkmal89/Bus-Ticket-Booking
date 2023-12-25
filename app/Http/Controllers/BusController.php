<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Location;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('pages.buses.index', compact('buses'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('pages.buses.create', ['location_id' => $locations]);

    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'bus_name' => 'required|string|max:255',
        'location_id' => 'required|exists:locations,id',
        'total_seats' => 'required|integer|min:1',
        'bus_image' => 'nullable|image|max:2048',

    ]);

    Bus::create([
        'bus_name' => $request->bus_name,
        'location_id' => $request->location_id,
        'total_seats' => $request->total_seats,
        'bus_image' => $request->file('bus_image')->store('buses'),
    ]);

    return redirect()->route('buses.index')->with('success', 'Bus created successfully!');
}


public function edit($id)
{

    $bus = Bus::findOrFail($id);


    $locations = Location::all();

    return view('pages.buses.edit', compact('bus', 'locations'));
}

public function update(Request $request, $id)
{

    $request->validate([
        'bus_name' => 'required|string|max:255',
        'location_id' => 'required|exists:locations,id',
        'total_seats' => 'required|integer|min:1',
        'bus_image' => 'nullable|image|max:2048',
    ]);


    $bus = Bus::findOrFail($id);


    $bus->update([
        'bus_name' => $request->bus_name,
        'location_id' => $request->location_id,
        'total_seats' => $request->total_seats,

        $bus = Bus::find(1),
        $bus->status = 0,
        $bus->save(),

    ]);


    return redirect()->route('buses.index')->with('success', 'Bus updated successfully!');
}

public function destroy($id)
{

    $bus = Bus::findOrFail($id);


    $bus->delete();


    return redirect()->route('buses.index')->with('success', 'Bus deleted successfully!');
}


}

