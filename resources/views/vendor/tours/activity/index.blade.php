@extends('vendor_main')
@section('title', 'Home')
@section('content')

<h1>hi</h1>
@foreach ($activities as $activity)
  <div>
    <a href="{{ route('vendor.tours.activity.add', [$tour->id, $activity->id]) }}">{{ $activity->name }}</a>
  </div>
@endforeach

<form action="{{ route('vendor.tours.activity.index', ['vendor' => 1, 'tour' => $tour->id]) }}" method="GET">
  <div class="form-group">
    <label for="search">Search Activities:</label>
    <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>


<h2>Added Activities:</h2>
    <ul>
        @foreach ($tour->activities as $activity)
            <li>{{ $activity->name }} - {{ $activity->description }}</li>
        @endforeach
    </ul>
@endsection
