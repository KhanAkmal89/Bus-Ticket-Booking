@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between align-items-center">Edit Trips
                    <a href="{{route('trips.index')}}" class="btn btn-warning">Back</a>
                </h4>
                <div class="card-body">
                    <form class="browser-default-validation" action="{{route('trips.store', $trip->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{$bus_category_id->name}}"
                                placeholder="Enter product brand name"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Bus Route</label>
                            <input
                                type="text"
                                id="description"
                                name="description"
                                value="{{$location_id->location_id}}"
                                class="form-control"
                                placeholder="Enter product brand description"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Non A/C</option>
                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>A/C</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Trip</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
