@extends('vendor/show')
@section('title', 'Home')
@section('content')


<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Update Tour Date</h3>
  </div>
  <a href="{{ route('vendor.tours.index', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Back</a>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@include('components/tour_tabs')
<div class="p-5 table_style radius">
    <form action="{{ route('vendor.tours.tour_date.update', ['vendor' => $tour->vendor->id, 'tour' => $tour->id, 'tour_date' => $tourDate->id]) }}" method="POST">
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
</div>


@endsection