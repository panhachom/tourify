@extends('vendor_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
  <h3>Update Tour Date</h3>
</div>

@include('components/tour_tabs')
<form action="{{ route('vendor.tours.tour_date.update', ['vendor' => $vendorId, 'tour' => $tourId, 'tour_date' => $tourDate->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="d-flex mt-2 mb-4 gap-2">
        <div class="form-group w-25">
            <label for="start_date" class="my-1">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $tourDate->start_date }}">
            @if ($errors->has('start_date'))
            <div class="alert alert-danger my-1">
                {{ $errors->first('start_date') }}
            </div>
            @endif
        </div>

        <div class="form-group w-25">
            <label for="end_date" class="my-1">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $tourDate->end_date }}">
            @if ($errors->has('end_date'))
            <div class="alert alert-danger my-1">
                {{ $errors->first('end_date') }}
            </div>
            @endif
        </div>
    </div>

    <table class="table mt-5">
    <thead class="thead-light">
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> {{ date('Y-m-d', strtotime($tourDate->start_date)) }}</td>
            <td> {{ date('Y-m-d', strtotime( $tourDate->end_date) )}}</td>
        </tr>
    </tbody>

    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection