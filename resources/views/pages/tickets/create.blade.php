@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Purchase Ticket
                    <a href="{{ route('tickets.index') }}" class="btn btn-warning">Back</a>
                </h4>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="needs-validation" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- User ID  -->
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Select A User:</label>
                            <select name="user_id" class="form-select" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a User.</div>
                        </div>

                        <!-- Bus ID -->
                        <div class="mb-3">
                            <label for="bus_id" class="form-label">Select Bus Name:</label>
                            <select name="bus_id" class="form-select" required>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}">{{ $bus->bus_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a bus name.</div>
                        </div>

                        <!-- Location ID -->
                        <div class="mb-3">
                            <label for="location_id" class="form-label">Select Location:</label>
                            <select name="location_id" class="form-select" required>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a location.</div>
                        </div>

                        <!-- Ticket Price -->

                        <div class="mb-3">
                            <label for="ticket_price" class="form-label">Ticket Price:</label>
                            <input type="number" name="ticket_price" class="form-control" step="0.01" required>
                            <div class="invalid-feedback">Please provide the ticket price.</div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Condition:</label>
                            <select name="status" class="form-select" required>
                                <option value="active">A/C</option>
                                <option value="inactive">Non A/C</option>
                            </select>
                            <div class="invalid-feedback">Please select the condition.</div>
                        </div>

                        <!-- Seat Number -->
                        <div class="mb-3">
                            <label for="seat_number" class="form-label">Select Seat Number:</label>
                            <input type="number" name="seat_number" class="form-control" required>
                            <div class="invalid-feedback">Please select a seat number.</div>
                        </div>

                        <!-- Total Amount -->
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount:</label>
                            <input type="number" name="total_amount" class="form-control" step="0.01" required>
                            <div class="invalid-feedback">Please provide the total amount.</div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Purchase Ticket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
