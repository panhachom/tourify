@extends('vendor/show')
@section('title', 'Activity')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{ $tour->name}}</h3>
  </div>
  <a href="{{ route('vendor.tours.index', ['vendor' => $vendor_id]) }}" class="btn btn-primary text-white">Back</a>

</div>


@include('components/tour_tabs')
<form action="{{ route('vendor.tours.activity.index', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}" method="GET">
  <div class="form-group">
    <div class="w-50 d-flex">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Activity">
      <button type="submit" class="btn btn-primary ms-2">Search</button>
    </div>
  </div>
</form>


@foreach ($activities as $activity)
  <ul class="mt-3 mb-4">
    <li>
      <div class="d-flex align-items-center gap-2">
        <div>{{ $activity->name }}</div>
        @if ($tour->activities->contains($activity))
          <span class="text-success">Already added</span>
        @else
          <a href="{{ route('vendor.tours.activity.add', [$tour->id, $activity->id]) }}" class="btn btn-light">
             <i class="bi bi-check-lg text-success"></i>
          </a>
        @endif
      </div>
    </li>
 </ul>
@endforeach

@if ($tour->activities->isEmpty())
 <p class="mt-5">No Activity. Please add one.</p>
@else
<h3 class="mt-5">Added Activities </h3>

<table class="table mt-5 table_style">
  <thead class="thead-light">
    <tr>
        <th>Titile</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($tour->activities as $activity)
        <tr>
            <td> {{ $activity->name }}</td>
            <td> {{ $activity->description }}</td>
            <td>
               <form action="{{ route('vendor.tours.activity.destroy', ['vendor' => $vendor_id, 'tour' => $tour->id, 'activity' => $activity->id]) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
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
