@extends('vendor_main')
@section('title', 'Edit Booking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h4> Booking Number : {{ strtoupper(substr($booking->tours->first()->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}</h4>
  </div>
  <a href="{{ route('vendor.booking.index', ['vendor' => 1]) }}" class="btn btn-success text-white">Back</a>

</div>

<div class="border p-5 table_style radius">
    <form action="{{ route('vendor.booking.update', ['vendor' => 1, 'booking' => $booking->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-6 my-2">
                <label for="tour_id" class="my-1" >Tour</label>
                <select name="tour_id" id="booking_tour_id" class="form-control">
                    @foreach($tours as $tour)
                        <option class="" value="{{ $tour->id }}" {{ $tour->id == $booking->tours->first()->id ? 'selected' : '' }}>
                            {{ $tour->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 my-2">
                <label for="quantity" class="my-1">Number of people</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $booking->quantity) }}">
            </div>

            <div class="form-group col-6 my-2">
                <label for="total" class="my-1" >Total $</label>
                <input type="text" name="total" id="total" class="form-control" value="{{ old('total', $booking->total) }}">
            </div>

            <div class="form-group col-12 my-2">
                <label for="approved" class="my-1">Approved Booking </label>
                <input type="checkbox" class="ms-2" id="approved" name="approved" value="1" {{ $booking->approved ? 'checked' : '' }}>
            </div>

        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
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



