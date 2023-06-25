@extends('vendor/show')
@section('title', 'Tour')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{ $tour->name}}</h3>
  </div>
  <a href="{{ route('vendor.tours.index', ['vendor' => $vendor_id]) }}" class="btn btn-primary text-white">Back</a>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@include('components/tour_tabs')

<div class="border p-5 table_style radius">
    <form action="{{ route('vendor.tours.update', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name"><small><i class="fa-solid fa-asterisk"></i></small> Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('name', $tour->name) }}"  name="name" required>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        
            <div class="form-group col-6 my-2 ">
                <label for="price"><small><i class="fa-solid fa-asterisk"></i></small> Price</label>
                <input type="text" class="form-control" id="price" value="{{ old('name', $tour->price) }}" name="price" required>
            </div>
            @if ($errors->has('price'))
                <div class="alert alert-danger">
                    {{ $errors->first('price') }}
                </div>
            @endif

            <div class="form-group col-6 my-2 ">
                <label for="capacity"> <small><i class="fa-solid fa-asterisk"></i></small> Capacity</label>
                <input type="text" class="form-control" value="{{ old('name', $tour->capacity) }}" id="capacity" name="capacity" required>
            </div>

            @if ($errors->has('capacity'))
                <div class="alert alert-danger">
                    {{ $errors->first('capacity') }}
                </div>
            @endif

            <div class="form-group col-6 my-2 ">
                <label for="qty"> <small><i class="fa-solid fa-asterisk"></i></small> Availability</label>
                <input type="text" class="form-control" id="qty" name="qty" required value="{{ old('name', $tour->qty) }}">
            </div>

            @if ($errors->has('qty'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('qty') }}
                </div>
            @endif

            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ old('description', $tour->description) }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif

            <div class="form-group">
                <label for="categories"><small><i class="fa-solid fa-asterisk"></i></small> Categories</label>
                <div class="d-flex justify-content-center align-items-center mt-2 py-1">
                    @foreach($categories as $category)
                        <div class="checkbox">
                            <label>
                                <input class="mx-1" type="checkbox" name="categories[]" value="{{ $category->id }}" @if($tour->categories->contains($category->id)) checked @endif">
                                <label class="form-check-label mx-1">{{ $category->name }}</label>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($errors->has('categories'))
                <div class="alert alert-danger">
                    {{ $errors->first('categories') }}
                </div>
            @endif

        </div>

        <button type="submit" class="btn btn-success text-white mt-4">Update</button>
    </form>
</div>


@endsection
























