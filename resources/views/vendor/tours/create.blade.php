@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Create New Tour</h3>
    <a href="{{ route('vendor.tours.index', ['vendor' => 1]) }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form method="POST" action="{{ route('vendor.tours.store', ['vendor' => 1]) }}">
        @csrf
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        
            <div class="form-group col-6 my-2 ">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group col-6 my-2 ">
                <label for="capacity">Capacity</label>
                <input type="text" class="form-control" id="capacity" name="capacity" required>
            </div>

            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>

            <div class="form-group mt-1">
                <label>Categories</label>
                <div class="d-flex justify-content-center align-items-center mt-2 py-1">
                    @foreach($categories as $category)
                        <div class="form-check">
                            <div class="">
                                <input class="form-check-input mx-1" type="checkbox" name="categories[]" value="{{ $category->id }}">
                                <label class="form-check-label mx-1">{{ $category->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>

        <button type="submit" class="btn btn-success text-white mt-4">Create</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Initialize the select2 plugin on the countries dropdown
        $('#countries').select2({
            placeholder: 'Select countries',
            allowClear: true,
            closeOnSelect: false,
        });
    });
</script>

@endsection


