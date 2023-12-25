@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Create A Trip
                <a href="{{ route('trips.index') }}" class="btn btn-warning">Back</a>
            </h4>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="needs-validation" action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="bus_id" class="form-label">Select Bus Name:</label>
                        <select name="bus_id" class="form-select" required>
                            @foreach ($buses as $bus)
                                <option value="{{ $bus->id }}">{{ $bus->bus_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a bus name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="from_location" class="form-label">From Location:</label>
                        <input type="text" name="from_location" value="Dhaka" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="location_id" class="form-label">Select Location:</label>
                        <select name="location_id" class="form-select" required>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a location.</div>
                    </div>

                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Departure Date:</label>
                        <input type="date" name="departure_date" class="form-control" required>
                        <div class="invalid-feedback">Please provide a valid departure date.</div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create Trip</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
