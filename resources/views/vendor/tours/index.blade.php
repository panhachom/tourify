@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>All Tours</h3>
  </div>
  <a href="{{ route('vendor.tours.create', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Create New Tour</a>
</div>

@if ($tours->isEmpty())
    <p>No Tour. Please add one.</p>
@else
  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class="thead-light header_color text-black">
      <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Price</th>
          <th class="text-center">Capacity</th>
          <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <div class="d-none">
      {{ $i= 1}}
      </div>
      @foreach($tours as $tour)
                  <tr>
                      <td>{{ $i++}}</td>
                      <td class="d-flex justify-content-start flex-column align-items-start">
                        <div>{{ $tour->name }}</div>
                        <div class="small-text">
                          @foreach($tour->categories as $category)
                             {{' '}}{{$category->name}} 
                          @endforeach
                        </div>

                      </td>
                      <td class="text-success">${{ $tour->price }}</td>
                      <td class="text-center">{{ $tour->capacity }} </td>

                      <td class="text-center">
                          <a href="{{ route('vendor.tours.edit', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Edit</i></a>
                          <form action="{{ route('vendor.tours.destroy', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this tour?')">
                                  <i class="bi bi-trash text-danger"> Delete</i>
                                  </button>
                          </form>
                      </td>
                  </tr>

              @endforeach
    </tbody>
  </table>

@endif

@endsection



