<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Bus;
use App\Models\Location;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('pages.tickets.index', ['tickets' => $tickets]);
    }

    public function create()
    {
        $users = User::all();
        $buses = Bus::all();
        $locations = Location::all();

        return view('pages.tickets.create', ['users' => $users, 'buses' => $buses, 'locations' => $locations]);
    }

    public function store(Request $request)
    {
        // dd($request->all);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:buses,id',
            'location_id' => 'required|exists:locations,id',
            'ticket_price' => 'required|numeric',
            'status' => 'required|string',
            'seat_number' => 'required|integer',
            'total_amount' => 'required|numeric',

        ]);


        Ticket::create([
            'user_id' => $request->user_id,
            'bus_id' => $request->bus_id,
            'location_id' => $request->location_id,
            'ticket_price' => $request->ticket_price,
            'status' => $request->status == 'active' ? 1 : 0,
            'seat_number' => $request->seat_number,
            'total_amount' => $request->total_amount,

        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket booked successfully!');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('pages.tickets.show', ['ticket' => $ticket]);
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $users = User::all();
        $buses = Bus::all();
        $locations = Location::all();

        return view('pages.tickets.edit', ['ticket' => $ticket, 'users' => $users, 'buses' => $buses, 'locations' => $locations]);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);


        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:buses,id',
            'location_id' => 'required|exists:locations,id',
            'ticket_price' => 'required|numeric',
            'status' => 'required|string',
            'seat_number' => 'required|integer',
            'total_amount' => 'required|numeric',

        ]);

        // Update the ticket
        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully!');
    }
}
