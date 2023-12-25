@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Buses
                    <a href="{{ route('buses.create') }}" class="btn btn-success">Add a Bus</a>
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
                                <th>Bus Name</th>
                                <th class="text-center">Location</th>
                                <th>Total Seats</th>
                                <th>Image</th>
                                <th>Condition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buses as $bus)
                                <tr>
                                    <td>{{ $bus->id }}</td>
                                    <td>{{ $bus->bus_name }}</td>
                                    <td>{{ $bus->location->name }}</td>
                                    <td class="text-center">{{ $bus->total_seats }}</td>
                                    <td>
                                        <img src="{{asset('./images/buses/'.$bus->image)}}" alt="" width="50">
                                    </td>
                                    <td class="text-center">
                                        @if($bus->status)
                                            <span class="badge bg-label-primary me-1">A/C</span>
                                        @else
                                            <span class="badge bg-label-warning me-1">Non A/C</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('buses.edit', $bus->id)}}"
                                                ><i class="ti ti-pencil me-1"></i> Edit</a
                                                >
                                                <form action="{{route('buses.destroy', $bus->id)}}" method="post" class="dropdown-item">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="ti ti-trash me-1"></i>
                                                    <input type="submit" value="Delete" class="border-0 bg-ligt">
                                                </form>
                                            </div>
                                        </div>
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
