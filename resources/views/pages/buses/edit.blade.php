@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Edit Bus - {{ $bus->id }}
                    <a href="{{ route('buses.index') }}" class="btn btn-warning">Back</a>
                </h4>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="needs-validation" action="{{ route('buses.update', $bus->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT') {{-- Use the PUT method for updates --}}

                        <div class="mb-3">
                            <label for="bus_name" class="form-label">Bus Name:</label>
                            <input type="text" name="bus_name" class="form-control" value="{{ $bus->bus_name }}" required>
                            <div class="invalid-feedback">Please provide a bus name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="location_id" class="form-label">Select Location:</label>
                            <select name="location_id" class="form-select" required>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" {{ $bus->location_id == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a location.</div>
                        </div>

                        <div class="mb-3">
                            <label for="total_seats" class="form-label">Total Seats:</label>
                            <input type="number" name="total_seats" class="form-control" value="{{ $bus->total_seats }}" required>
                            <div class="invalid-feedback">Please provide the total number of seats.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="image">Bus Image</label>
                            <input type="file" class="form-control" id="image" name="bus_image" required/>
                            <div class="invalid-feedback">Please provide a valid bus image.</div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Condition:</label>
                            <select name="status" class="form-select" required>
                                <option value="0" {{$bus->status == 0 ? 'selected' : ''}}>Non A/C</option>
                                <option value="1" {{$bus->status == 1 ? 'selected' : ''}}>A/C</option>
                            </select>
                            <div class="invalid-feedback">Please select a status.</div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Bus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
