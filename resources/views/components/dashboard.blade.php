<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Dashbaord</h3>
  </div>
     <div class="test">
        <h4> {{ $vendor->name}}</h4>
        <p> <small> {{$vendor->email}}</small> </p>
     </div>
</div>

<div class="d-flex gap-4 justify-content-start align-items-start">
      <div class="dashboard-card-1">
              <div class="px-4 py-3 d-flex justify-content-between align-items-start">
                  <div>
                      <h4>{{ $tours->count() }} </h4>
                      <p class="f-bold">
                      <strong class="text-secondary"> Tours </strong>    
                      </p>
                  </div>
                  <div class="circle-button d-flex justify-content-center align-items-center">
                    <i class='bx bx-category'></i>
                  </div>
              </div>
      </div>
      <div class="dashboard-card-2">
              <div class="px-4 py-3 d-flex justify-content-between align-items-start">
                  <div>
                      <h4>{{ $bookings->count() }} </h4>
                      <p class="f-bold">
                      <strong class="text-secondary"> Bookings </strong>    
                      </p>
                  </div>
                  <div class="circle-button d-flex justify-content-center align-items-center">
                  <i class="bi bi-bag"></i>               
                  </div>
              </div>
      </div>

      <div class="dashboard-card-3">
              <div class="px-4 py-3 d-flex justify-content-between align-items-start">
                  <div>
                      <h4>{{ $activities->count() }} </h4>
                      <p class="f-bold">
                      <strong class="text-secondary"> Activity </strong>    
                      </p>
                  </div>
                  <div class="circle-button d-flex justify-content-center align-items-center">
                  <i class="bi bi-card-checklist"></i>           
                  </div>
              </div>
      </div>
</div>

<div class="row mt-5">
    <div class="col-7">
      <h4 class="my-3 h4-1">Latest Tours</h4>
      <table class="table align-middle mb-0 bg-white table-border-dashboard">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>category</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        @foreach($recentTours as $tour)

          <tr>
            <td>{{ $tour->name }}</td>
            <td>
            <div class="small-text">
                  @foreach($tour->categories as $category)
                      {{' '}}{{$category->name}} 
                  @endforeach
              </div>
            </td>
            <td>{{ $tour->price }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>

<div class="col-5">
  <h4 class="my-3 h4-2">Latest Activity</h4>

      <table class="table align-middle mb-0 bg-white table-border-dashboard">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
        @foreach($recentActivities as $activity)

          <tr>
            <td>{{ $activity->name }}</td>
            <td>{{ $activity->description }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>

</div>



<div class="row mt-4">

<div class="col-12">
<h4 class="my-3 h4-3">Latest Bookings</h4>

      <table class="table align-middle mb-0 bg-white table-border-dashboard">
        <thead class="bg-light">
          <tr>
            <th>Booking Number</th>
            <th>Tours</th>
            <th class="text-center">Status</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        @foreach($recentBookings as $booking)

          <tr>
            <td>
              <strong> <i>
                  {{ strtoupper(substr($booking->tours->first()->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}
              </i></strong>
            </td>
            <td>{{ $booking->tours->first()->name }}</td>
            <td class="text-center">
              @if($booking->approved)
                <i class="bi bi-check-circle text-success"></i><span>Approve</span> <!-- Icon for tick -->
              @else
                <i class="bi bi-clock text-warning"></i><span>Pendding</span> <!-- Icon for pending -->
              @endif
            </td>
            <td class="text-success">
                          $ {{ $booking->total }} 
             </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>

</div>

