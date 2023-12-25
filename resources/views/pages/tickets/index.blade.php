@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Ticket List
                    <a href="{{ route('tickets.create') }}" class="btn btn-success">Book A Ticket</a>
                </h4>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Phone</th>
                                <th>Bus Name</th>
                                <th>Location</th>
                                <th>Ticket Price</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ $ticket->user->phone }}</td>
                                    <td>{{ $ticket->bus->bus_name }}</td>
                                    <td>{{ $ticket->location->name }}</td>
                                    <td>{{ $ticket->ticket_price }}</td>
                                    <td>{{ $ticket->total_amount }}</td>
                                    <td>{{ $ticket->status }}</td>
                                    <td>
                                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
