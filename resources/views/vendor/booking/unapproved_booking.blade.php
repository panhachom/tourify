@extends('vendor/show')
@section('title', 'Home')
@section('content')


<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Unapproved Booking</h3>
  </div>
</div>


@if ($unapprovedBookings->isEmpty())
    <p>No Booking Yet</p>
@else

@include('components/booking_tabs')

<table class="table mt-5 table-borderless table-hover table_style">
  <thead class=" header_color  text-black text-center">
    <tr class="text-center">
          <th>No</th>
          <th>Booking Number</th>
          <th>Tour</th>
          <th>Quantity</th>
          <th>Booking Date</th>
          <th>Total</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
    <div class="d-none">
      {{ $i= 1}}
      </div>
      @foreach($unapprovedBookings as $booking)
                <tr class="text-center">
                      <td>{{ $i++}}</td>
                      <td>
                        <strong>
                        {{ strtoupper(substr($booking->tours->first()->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}
                        </strong>
                      </td>
                      <td>{{ $booking->tours->first()->name }}</td>
                      <td>{{ $booking->tours->first()->qty }}</td>
                      <td class="text-center">{{ $booking->created_at->format('Y-m-d') }}</td>
                      <td class="text-success">
                          $ {{ $booking->total }} 
                      </td>

                      <td>
                          <a href="{{ route('vendor.booking.edit', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Edit</i></a>
                          <form action="" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this tour?')">
                                  <i class="bi bi-trash text-danger"> Delete</i>
                                  </button>
                          </form>
                      </td>
                  </tr>

              @endforeach
    </tbody>
  </table>

@endif

@endsection


