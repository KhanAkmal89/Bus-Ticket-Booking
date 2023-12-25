@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header bg-success text-white text-center">
                    Ticket Purchased Successfully
                </h4>
                <div class="card-body">
                    <div class="alert alert-success">
                        Your ticket has been purchased successfully! Here are the details:
                    </div>

                    <p><strong>User:</strong> {{ $ticket->user->name }}</p>
                    <strong>Email:</strong> ({{ $ticket->user->email }})</p>
                    <p><strong>Bus:</strong> {{ $ticket->bus->bus_name }}</p>
                    <p><strong>Location:</strong> {{ $ticket->location->name }}</p>
                    <p><strong>Ticket Price:</strong> {{ $ticket->ticket_price }}</p>
                    <p><strong>Condition:</strong> {{ $ticket->status == 1 ? 'A/C' : 'Non A/C' }}</p>
                    <p><strong>Seat Number:</strong> {{ $ticket->seat_number }}</p>
                    <p><strong>Total Amount:</strong> {{ $ticket->total_amount }}</p>


                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <a href="{{ route('tickets.index') }}" class="btn btn-primary">View All Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
