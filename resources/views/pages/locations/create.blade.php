@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Add A Route
                <a href="{{ route('locations.index') }}" class="btn btn-warning">Back</a>
            </h4>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="needs-validation" action="{{ route('locations.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Location Name:</label>
                        <input type="text" name="name" class="form-control" required>
                        <div class="invalid-feedback">Please provide a valid location name.</div>
                    </div>

                    {{-- add a filed for tiket price --}}
                    <div class="mb-3">
                        <label for="price">Price:</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create Route</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
