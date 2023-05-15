@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Tours</h3>
    <a href="{{ route('vendor.tours.create', ['vendor' => 1]) }}" class="btn btn-success text-white">Create New Tour</a>
</div>

@if ($tours->isEmpty())
    <p>No Tour. Please add one.</p>
@else
  <table class="table mt-5 table-bordered">
    <thead class="thead-light  bg-dark text-white">
      <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Capacity</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tours as $tour)
                  <tr>
                      <td>{{ $tour->name }}</td>
                      <td>{{ $tour->description }}</td>
                      <td>{{ $tour->price }}</td>
                      <td>{{ $tour->capacity }} </td>

                      <td>
                          <a href="{{ route('vendor.tours.edit', ['vendor' => 1, 'tour' => $tour->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"></i></a>
                          <form action="{{ route('vendor.tours.destroy', ['vendor' => 1, 'tour' => $tour->id]) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this tour?')">
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



