@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>All Booking</h3>
  </div>
</div>


@if ($bookings->isEmpty())
    <p>No Booking Yet</p>
@else

@include('components/booking_tabs')

  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class=" header_color  text-black text-center">
      <tr class="text-center">
          <th>No.</th>
          <th>Booking Number</th>
          <th>Tour</th>
          <th>Booking Date</th>
          <th>Status</th>
          <th>Total</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <div class="d-none">
      {{ $i= 1}}
      </div>
      @foreach($bookings as $booking)
                  <tr>
                      <td>
                        {{ $i++}}
                     </td>
                      <td> <strong> <i>
                           {{ strtoupper(substr($booking->tours->first()->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}
                      </i></strong></td>
                      <td>{{ $booking->tours->first()->name }}</td>
                      <td class="text-center">{{ $booking->created_at }} </td>
                      <td>
                      @if($booking->approved)
                        <i class="bi bi-check-circle text-success"></i> <!-- Icon for tick -->
                      @else
                        <i class="bi bi-clock text-warning"></i> <!-- Icon for pending -->
                      @endif
                      </td>
                      <td class="text-success">
                          $ {{ $booking->total }} 
                      </td>

                      <td>
                          <a href="{{ route('vendor.booking.edit', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Edit</i></a>
                          <form action="{{ route('vendor.booking.destroy', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" method="POST">
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


