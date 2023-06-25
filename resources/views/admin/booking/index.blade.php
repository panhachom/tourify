@extends('admin_main')
@section('title', 'Booking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Booking</h3>
  </div>
</div>

<div class="mb-3">
    <label for="filter" class="form-label">Filter:</label>
    <select id="filter" class="form-select" onchange="filterBookings(this.value)">
        <option value="">All</option>
        <option value="approved">Approved</option>
        <option value="pending">Pending</option>
    </select>
</div>

@if ($bookings->isEmpty())
    <p>No Booking.</p>
@else
  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class="thead-light header_color text-black">
      <tr>
          <th>No</th>
          <th>Booking ID</th>
          <th>Tour Name</th>
          <th class= "text-center">Customer</th>
          <th class="text-center">Quantity</th>
          <th class= "text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bookings as $index => $booking_item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td> <strong> 
                           {{ strtoupper(substr($booking_item->tour->vendor->name, 0, 3)) }}-{{ $booking_item->booking_number }}
                      </strong></td>                      <td>{{ $booking_item->tour->name}}</td>
                      <td class="text-center">{{ $booking_item->user->email}}</td>
                      <td class="text-center">{{ $booking_item->quantity}}</td>
                      <td class="text-center">
                          <a href="{{route('booking.show', ['booking' => $booking_item->id])}}" class="btn btn-sm btn-light">
                              <i class="bi bi-eye text-primary font-weight-bold p-3"></i>View
                          </a>
                          <form action="{{route('booking.destroy', ['booking' => $booking_item->id])}}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this Booking?')">
                                      <i class="bi bi-trash text-danger"></i>Delete
                                  </button>
                          </form>
                      </td>
                  </tr>
        @endforeach
    </tbody>
  </table>
@endif

@if (session('success'))
<div id="success-alert" class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

<script>
    // Hide the success message after 3 seconds
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000);

    function filterBookings(status) {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const approved = row.querySelector('.bi-check-circle');
            const pending = row.querySelector('.bi-clock');
            
            if (status === 'approved' && approved) {
                row.style.display = 'table-row';
            } else if (status === 'pending' && pending) {
                row.style.display = 'table-row';
            } else if (status === '') {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

<style>
    #success-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 300px;
    }
</style>

@endsection
