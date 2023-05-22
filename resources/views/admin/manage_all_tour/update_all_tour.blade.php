@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">

    <a href="/view_all_post" class="btn btn-success text-white">Back</a>
</div>


<div class="border p-5 rounded">
    <form action="{{url('/tour/'.$tour->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('name', $tour->name) }}"  name="name" required>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        
            <div class="form-group col-6 my-2 ">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" value="{{ old('name', $tour->price) }}" name="price" required>
            </div>
            @if ($errors->has('price'))
                <div class="alert alert-danger">
                    {{ $errors->first('price') }}
                </div>
            @endif

            <div class="form-group col-6 my-2 ">
                <label for="capacity">Capacity</label>
                <input type="text" class="form-control" value="{{ old('name', $tour->capacity) }}" id="capacity" name="capacity" required>
            </div>

            @if ($errors->has('capacity'))
                <div class="alert alert-danger">
                    {{ $errors->first('capacity') }}
                </div>
            @endif

            <div class="form-group col-6 my-2 ">
                <label for="qty">Quantity</label>
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