@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Trips
                <a href="{{ route('trips.create') }}" class="btn btn-success">Create New Trip</a>
            </h4>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($trips->isEmpty())
                    <p>No trips available.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bus Category</th>
                                <th>From Location</th>
                                <th>To Location</th>
                                <th>Departure Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $trip->id }}</td>
                                    <td>{{ $trip->bus->bus_name }}</td>
                                    <td>{{ $trip->from_location }}</td>
                                    <td>{{ $trip->location->name }}</td>
                                    <td>{{ $trip->departure_date }}</td>
                                    <td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('trips.edit', $trip->id)}}"
                                                    ><i class="ti ti-pencil me-1"></i> Edit</a
                                                    >
                                                    <form action="{{route('trips.destroy', $trip->id)}}" method="post" class="dropdown-item">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="ti ti-trash me-1"></i>
                                                        <input type="submit" value="Delete" class="border-0 bg-light">
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
