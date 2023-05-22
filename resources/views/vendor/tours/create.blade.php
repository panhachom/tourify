@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Create New Tour</h3>
    <a href="{{ route('vendor.tours.index', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form method="POST" action="{{ route('vendor.tours.store', ['vendor' => $vendor_id]) }}">
        @csrf
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name"> <small><i class="fa-solid fa-asterisk"></i></small> Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        
            <div class="form-group col-6 my-2 ">
                <label for="price"> <small><i class="fa-solid fa-asterisk"></i></small> Price</label>
                <input type="text" class="form-control" id="price" name="price" required value="{{ old('price') }}">
            </div>

            @if ($errors->has('price'))
                <div class="alert alert-danger">
                    {{ $errors->first('price') }}
                </div>
            @endif


            <div class="form-group col-6 my-2 ">
                <label for="capacity"> <small><i class="fa-solid fa-asterisk"></i></small> Capacity</label>
                <input type="text" class="form-control" id="capacity" name="capacity" required value="{{ old('capacity') }}" >
            </div>
            @if ($errors->has('capacity'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('capacity') }}
                </div>
            @endif

            <div class="form-group col-6 my-2 ">
                <label for="qty">  <small><i class="fa-solid fa-asterisk"></i></small> Availability</label>
                <input type="text" class="form-control" id="qty" name="qty" required value="{{ old('qty') }}">
            </div>

            @if ($errors->has('qty'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('qty') }}
                </div>
            @endif

            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ old('description') }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('description') }}
                </div>
            @endif
            <div class="form-group my-1">
                <label><small><i class="fa-solid fa-asterisk"></i></small> Categories</label>
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
            @if ($errors->has('categories'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('categories') }}
                </div>
            @endif
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


