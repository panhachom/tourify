@extends('vendor/show')
@section('title', 'Booking')
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


  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class=" header_color  text-black text-center">
      <tr class="text-center">
          <th>No.</th>
          <th>Booking Number</th>
          <th>Tour</th>
          <!-- <th>Booking Date</th> -->
          <!-- <th>Status</th> -->
          <th>Total</th>
          <th colspan="2" >Action</th>
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
                      <td> <strong> 
                           {{ strtoupper(substr($booking->tour->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}
                      </strong></td>
                      <td>{{ $booking->tour->name }}</td>
                      <td class="text-success">
                          $ {{ $booking->total }} 
                      </td>

                      <td colspan="2">
                          <a href="{{ route('vendor.booking.show', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold"> Show</i></a>
                          <!-- <form action="{{ route('vendor.booking.destroy', ['vendor' => $vendor_id, 'booking' => $booking->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this tour?')">
                                  <i class="bi bi-trash text-danger"> Delete</i>
                                  </button>
                          </form> -->
                      </td>
                  </tr>

              @endforeach
    </tbody>
  </table>

@endif

@endsection


