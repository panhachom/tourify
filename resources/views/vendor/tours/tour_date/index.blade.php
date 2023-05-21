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
<!-- create.blade.php -->
<form action="{{ route('vendor.tours.tour_date.store', ['vendor' => 1, 'tour' => $tour->id]) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="d-flex mt-2 mb-4 gap-2">
        <div class="form-group w-25">
            <label for="start_date" class="my-1">Start Date</label>
            <input type="date" name="start_date" class="form-control">
            @if ($errors->has('start_date'))
            <div class="alert alert-danger my-1">
                {{ $errors->first('start_date') }}
            </div>
             @endif
        </div>
    

        <div class="form-group w-25">
            <label for="end_date" class="my-1">End Date</label>
            <input type="date" name="end_date" class="form-control">
            @if ($errors->has('end_date'))
            <div class="alert alert-danger my-1">
                {{ $errors->first('end_date') }}
            </div>
            @endif
        </div>
    
    </div>
    
    <button type="submit" class="btn btn-success">Create</button>
</form>

@if ($tour->tour_dates->isEmpty())
    <br>
    <p>No Date Please add one.</p>
@else
<table class="table mt-5 table_style">
    <thead class="thead-light">
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tour_dates as $tourDate)
        <tr>
            <td> {{ date('Y-m-d', strtotime($tourDate->start_date)) }}</td>
            <td> {{ date('Y-m-d', strtotime($tourDate->end_date)) }}</td>
            <td>
                <div class="d-flex gap-2">
                <a href="{{ route('vendor.tours.tour_date.edit', ['vendor' => 1, 'tour' => $tour->id ,'tour_date' => $tourDate->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"></i></a>
                <form action="{{ route('vendor.tours.tour_date.destroy', ['vendor' => 1, 'tour' => $tour->id, 'tour_date' => $tourDate->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this Activity?')">
                            <i class="bi bi-trash text-danger"></i>
                    </button>            
                </form>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection