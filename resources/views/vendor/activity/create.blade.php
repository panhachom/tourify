@extends('vendor_main')
@section('title', 'Home')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Create New Activity</h3>
    <a href="{{ route('vendor.activity.index', ['vendor' => 1]) }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form method="POST" action="{{ route('vendor.activity.store', ['vendor' => 1]) }}">
        @csrf
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        
            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success text-white mt-4">Create</button>
    </form>
</div>

@endsection