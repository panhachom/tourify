@extends('vendor/show')
@section('title', 'Edit Booking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h4> Booking Number : {{ strtoupper(substr($booking->tour->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}</h4>
  </div>
  <a href="{{ route('vendor.booking.index', ['vendor' => $vendor_id]) }}" class="btn btn-primary text-white">Back</a>

</div>

@include('components/payment_tabs')


<div class="border p-5 table_style radius">
    <form action="{{ route('vendor.booking.update', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-6 my-2">
                <label for="tour_id" class="my-1" >Tour</label>
                <select name="tour_id" id="booking_tour_id" class="form-control">
                    @foreach($tours as $tour)
                        <option class="" value="{{ $tour->id }}" {{ $tour->id == $booking->tour->id ? 'selected' : '' }}>
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
                <label for="quantity" class="my-1">Price $ </label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $booking->price) }}">
            </div>

            <div class="form-group col-6 my-2">
                <label for="total" class="my-1" >Total $</label>
                <input type="text" name="total" id="total" class="form-control" value="{{ old('total', $booking->total) }}">
            </div>

            <div class="form-group col-6 my-2">
                <label for="total" class="my-1" >Payment Method</label>
                <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ old('payment_method', $booking->payment_method) }}">
            </div>

           

        </div>

    </form>
</div>







@endsection



