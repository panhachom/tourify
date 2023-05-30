@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Category</h3>
  </div>
  <a href="{{ route('vendor.category.create', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Create New category</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if ($categories->isEmpty())
    <p>No category. Please add one.</p>
@else
  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class=" header_color  text-black ">
      <tr>
          <th>No</th>
          <th>Name</th>
          <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach($categories as $index => $category_item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $category_item->name }}</td>
                      <td class="text-center">
                          <a href="{{ route('vendor.category.edit', ['vendor' => $vendor_id, 'category' => $category_item->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Edit</i></a>
                          <form action="{{ route('vendor.category.destroy', ['vendor' => $vendor_id, 'category' => $category_item->id]) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this category?')">
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