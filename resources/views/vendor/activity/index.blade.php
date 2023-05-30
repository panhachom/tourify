@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Activity</h3>
  </div>
  <a href="{{ route('vendor.activity.create', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Create New Activity</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if ($activities->isEmpty())
    <p>No Activity. Please add one.</p>
@else
  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class=" header_color  text-black ">
      <tr>
          <th>No</th>
          <th>Name</th>
          <th>Description</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach($activities as $index => $activity_item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $activity_item->name }}</td>
                      <td>{{ Str::limit($activity_item->description, 50, '...') }}</td>
                      <td>{{ $activity_item->created_at -> format('d/m/Y')}} </td>
                      <td>{{ $activity_item->updated_at -> format('d/m/Y')}}</td>
                      <td>
                          <a href="{{ route('vendor.activity.edit', ['vendor' => $vendor_id, 'activity' => $activity_item->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Edit</i></a>
                          <form action="{{ route('vendor.activity.destroy', ['vendor' => $vendor_id, 'activity' => $activity_item->id]) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this Activity?')">
                                  <i class="bi bi-trash text-danger"> Delete</i>
                                  </button>
                          </form>
                      </td>
                  </tr>
              @endforeach
    </tbody>
  </table>

  @if (session('success'))
    <div id="success-alert" class="alert alert-success text-center">
        {{ session('success') }}
    </div>
  @endif

  <script>
      // Hide the success message after 3 seconds
      setTimeout(function () {
          document.getElementById('success-alert').style.display = 'none';
      }, 3000);
  </script>

  <style>
      #success-alert {
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          z-index: 9999;
          width: 300px;
      }
  </style>

@endif

@endsection
