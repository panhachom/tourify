@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>{{ $tour->name}}</h3>
    <a href="{{ route('vendor.tours.images.index', ['vendor' => 1,'tour' =>  $tour->id]) }}" class="btn btn-success text-white">Back</a>
</div>

@include('components/tour_tabs')

<form action="{{ route('vendor.tours.images.store', ['vendor' => 1, 'tour' => $tour->id]) }}" method="POST" enctype="multipart/form-data">

    @csrf
    <div>
        <label for="image"> Tour Image </label>
        <input type="file" name="image" id="image">
        @if ($errors->has('image'))
                <div class="alert alert-danger mx-1">
                    {{ $errors->first('image') }}
                </div>
        @endif
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>

@endsection