@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Bus Route
                <a href="{{ route('locations.create') }}" class="btn btn-success">Add A Route</a>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Ticket Price (Tk.)</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td class="text-center">{{ $location->name }}</td>
                                <td class="text-center">{{ $location->price }}</td>
                                <td class="text-center">
                                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                                    
                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this route?')">
                                            <i class="ti ti-trash me-1"></i>Delete
                                        </button>
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
