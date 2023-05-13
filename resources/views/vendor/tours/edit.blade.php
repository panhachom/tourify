@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>{{ $tour->name}}</h3>
    <a href="{{ route('vendor.tours.index', ['vendor' => 1]) }}" class="btn btn-success text-white">Back</a>
</div>

@include('components/tour_tabs')

<div class="border p-5 rounded">
    <form action="{{ route('vendor.tours.update', ['vendor' => 1, 'tour' => $tour->id]) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('name', $tour->name) }}"  name="name" required>
            </div>
        
            <div class="form-group col-6 my-2 ">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" value="{{ old('name', $tour->price) }}" name="price" required>
            </div>

            <div class="form-group col-6 my-2 ">
                <label for="capacity">Capacity</label>
                <input type="text" class="form-control" value="{{ old('name', $tour->capacity) }}" id="capacity" name="capacity" required>
            </div>

            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" value="{{ old('name', $tour->description) }}" name="description" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success text-white mt-4">Update</button>
    </form>
</div>


@endsection
























