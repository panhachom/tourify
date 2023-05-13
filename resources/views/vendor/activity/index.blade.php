@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Activity</h3>
    <a href="{{ route('vendor.activity.create', ['vendor' => 1]) }}" class="btn btn-success text-white">Create New Activity</a>
</div>

@if ($activities->isEmpty())
    <p>No Activity. Please add one.</p>
@else
  <table class="table mt-5 table-bordered">
    <thead class="thead-light  bg-dark text-white">
      <tr>
          <th>No</th>
          <th>Name</th>
          <th>Description</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($activities as $index => $activity_item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $activity_item->name }}</td>
                      <td>{{ $activity_item->description }}</td>
                      <td>{{ $activity_item->created_at -> format('d/m/Y')}} </td>
                      <td>{{ $activity_item->updated_at -> format('d/m/Y')}}</td>
                      <td>
                          <a href="{{ route('vendor.activity.edit', ['vendor' => 1, 'activity' => $activity_item->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"></i></a>
                          <form action="{{ route('vendor.activity.destroy', ['vendor' => 1, 'activity' => $activity_item->id]) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this Activity?')">
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