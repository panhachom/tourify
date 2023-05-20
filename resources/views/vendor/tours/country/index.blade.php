@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{ $tour->name}}</h3>
  </div>
</div>

@include('components/tour_tabs')

<form action="{{ route('vendor.tours.country.index', ['vendor' => 1, 'tour' => $tour->id]) }}" method="GET">
  <div class="form-group">
    <div class="w-50 d-flex">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Country">
      <button type="submit" class="btn btn-primary ms-2">Search</button>
    </div>
  </div>
</form>


@foreach ($countries as $country)
  <ul class="mt-3 mb-4">
    <li>
      <div class="d-flex align-items-center gap-2">
        <div>{{ $country->country }}</div>
        @if ($tour->countries->contains($country))
          <span class="text-success">Already added</span>
        @else
          <a href="{{ route('vendor.tours.country.add', [$tour->id, $country->id]) }}" class="btn btn-light">
             <i class="bi bi-check-lg text-success"></i>
          </a>
        @endif
      </div>
    </li>
 </ul>
@endforeach

@if ($tour->countries->isEmpty())
 <p class="mt-5">No Country. Please add one.</p>
@else
<h3 class="mt-5">Added Countries </h3>

<table class="table mt-5 table_style" >
  <thead class="thead-light">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($tour->countries as $country)
        <tr>
            <td> {{ $country->country }}</td>
            <td>
               <form action="{{ route('vendor.tours.country.destroy', ['vendor' => 1, 'tour' => $tour->id, 'country' => $country->id]) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <input type="hidden" name="country_id" value="{{ $country->id }}">
                <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to remove this country?')">
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
