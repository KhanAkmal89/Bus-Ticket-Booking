@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                Edit User - {{ $user->name }}
                <a href="{{ route('users.index') }}" class="btn btn-warning">Back</a>
            </h4>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="needs-validation" action="{{ route('users.update', $user->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        <div class="invalid-feedback">Please provide a name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        <div class="invalid-feedback">Please provide a valid email.</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}" required>
                        <div class="invalid-feedback">Please provide a phone number.</div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
