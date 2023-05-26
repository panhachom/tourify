@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Booking</h3>
  </div>
  <a href="{{ route('booking.index') }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 table_style radius">

      <div class="row">
          <div class="form-group col-6 my-2">
              <label for="tour_id" class="my-1" >Tour</label>
              <input type="text" name="tour_name" id="tour_name" class="form-control cursor-not-allowed" value="{{ old('tour_name', $booking->tours -> first()-> name) }}" readonly>
          </div>

          <div class="form-group col-6 my-2">
            <label for="quantity" class="my-1">Number of people</label>
            <input type="number" name="quantity" id="quantity" class="form-control cursor-not-allowed" value="{{ old('quantity', $booking->quantity) }}" readonly>
        </div>
        

          <div class="form-group col-6 my-2">
              <label for="total" class="my-1" >Total $</label>
              <input type="number" name="total" id="total" class="form-control cursor-not-allowed" value="{{ old('total', $booking->total) }}" readonly>
          </div>

          <div class="form-group col-12 my-2">
              <label for="approved" class="my-1">Status Booking </label>
              @if($booking -> approved)
                        <i class="bi bi-check-circle text-success"> Approved</i> <!-- Icon for tick -->
                        @else
                        <i class="bi bi-clock text-warning"> Pending</i> <!-- Icon for pending -->
                        @endif
          </div>

      </div>

</div>

<div class="row mt-5 justify-content-start align-items-start">
<h4>Tour and User</h4>

<div class="col-sm-4">
  <div class="card table_style">
    <div class="card-body">
      <h5 class="card-title">{{ $booking->tours->first()->name }}</h5>
      <p class="card-text">
          {{ $booking->tours->first()->description }}
      </p>
      <div class="d-flex justify-content-between align-items-center">
          <div class="price-message p-1">Price : ${{ $booking->tours->first()->price }}</div>
          <a href="#" class="btn header_color text-white" style = "background-color:#D5603F;">View Detail</a>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-4">
  <div class="card table_style">
    <div class="card-body">
      <h5 class="card-title">{{ $booking->user->username }}</h5>
      <p class="card-text">{{ $booking->user->email }}</p>
      <a href="#" class="btn header_color text-white" style = "background-color:#D5603F;">View Detail</a>
    </div>
  </div>
</div>
</div>

@endsection
