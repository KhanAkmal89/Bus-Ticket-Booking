@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Edit Ticket - {{ $ticket->id }}
                    <a href="{{ route('tickets.index') }}" class="btn btn-warning">Back</a>
                </h4>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="needs-validation" action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT') <!-- Use PUT method for update -->

                        <!-- User Information -->
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name:</label>
                            <input type="text" name="user_name" class="form-control" value="{{ $ticket->user_name }}" required>
                            <div class="invalid-feedback">Please provide your name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="user_email" class="form-label">User Email:</label>
                            <input type="email" name="user_email" class="form-control" value="{{ $ticket->user_email }}" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>

                        <div class="mb-3">
                            <label for="user_phone" class="form-label">User Phone:</label>
                            <input type="tel" name="user_phone" class="form-control" value="{{ $ticket->user_phone }}" required>
                            <div class="invalid-feedback">Please provide your phone number.</div>
                        </div>

                        <!-- Bus ID and Location ID... -->

                        <div class="mb-3">
                            <label for="bus_id" class="form-label">Select Bus Name:</label>
                            <select name="bus_id" class="form-select" required>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}" {{ $ticket->bus_id == $bus->id ? 'selected' : '' }}>
                                        {{ $bus->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a bus name.</div>
                        </div>

                        <!-- Location ID... -->

                        <div class="mb-3">
                            <label for="location_id" class="form-label">Select Location:</label>
                            <select name="location_id" class="form-select" required>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" {{ $ticket->location_id == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a location.</div>
                        </div>

                        <!-- Ticket Price -->

                        <div class="mb-3">
                            <label for="ticket_price" class="form-label">Ticket Price:</label>
                            <input type="number" name="ticket_price" class="form-control" step="0.01" value="{{ $ticket->ticket_price }}" required>
                            <div class="invalid-feedback">Please provide the ticket price.</div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Ticket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
