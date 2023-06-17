@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Booking</h3>
  </div>
  <a href="{{ route('booking.index') }}" class="btn btn-primary text-white">Back</a>
</div>

@include('components/admin_payment_tabs')


<div class="border p-5 table_style radius">

      <div class="row">
          <div class="form-group col-6 my-2">
              <label for="tour_id" class="my-1" >Tour</label>
              <input type="text" name="tour_name" id="tour_name" class="form-control cursor-not-allowed" value="{{ old('tour_name', $booking->tour-> name) }}" readonly>
          </div>

          <div class="form-group col-6 my-2">
            <label for="quantity" class="my-1">Number of people</label>
            <input type="number" name="quantity" id="quantity" class="form-control cursor-not-allowed" value="{{ old('quantity', $booking->quantity) }}" readonly>
        </div>

        <div class="form-group col-6 my-2">
                <label for="quantity" class="my-1">Price $ </label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $booking->price) }}">
            </div>
        

          <div class="form-group col-6 my-2">
              <label for="total" class="my-1" >Total $</label>
              <input type="number" name="total" id="total" class="form-control cursor-not-allowed" value="{{ old('total', $booking->total) }}" readonly>
          </div>

          <div class="form-group col-6 my-2">
                <label for="total" class="my-1" >Payment Method</label>
                <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ old('payment_method', $booking->payment_method) }}">
            </div>
      </div>

</div>



@endsection
