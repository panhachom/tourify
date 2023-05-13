@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>{{ $tour->name}}</h3>
    <a href="{{ route('vendor.tours.images.create', $params) }}" class="btn btn-success">New Image</a>
</div>

@include('components/tour_tabs')

@if ($images->isEmpty())
    <p>No Image. Please add one.</p>
@else
<table class="table mt-5">
  <thead class="thead-light">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($images as $image)
        <tr>
            <td style="vertical-align: middle;">{{ $image->id }}</td>
            <td style="vertical-align: middle;">
                <img src="{{ asset('images/tours/' . $image->name) }}" alt="Tour Image" style="width: 60px;height: 60px;">
            </td>
            <td style="vertical-align: middle;">
                <form action="{{ route('vendor.tours.images.destroy', ['vendor' => 1, 'tour' =>  $tour->id, 'image' => $image->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this image?')">
                        <i class="bi bi-trash text-danger"></i>
                    </button>               
                 </form>
            </td>
        
        </tr>

        @endforeach
  </tbody>
</table>

@endif


@endsection