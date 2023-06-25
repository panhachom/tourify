@extends('admin_main')
@section('title', 'Dashbaord')
@section('content')
@vite('resources/css/dashboard.css')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
    <div class="d-flex justify-content-center align-items-center">
        <i class="bi bi-back h4 me-3 vendor-icon "></i>
        <h3>Admin Dashbaord</h3>
    </div>

</div>

<div class="d-flex gap-4 justify-content-start align-items-start">
    <div class="dashboard-card-1">
        <div class="px-4 py-3 d-flex justify-content-between align-items-start">
            <div>
                <h4>{{ $tours->count() }} </h4>
                <p class="f-bold">
                    <strong class="text-secondary">Total Tours Post </strong>
                </p>
            </div>
            <div class="circle-button d-flex justify-content-center align-items-center">
                <i class='bx bx-bar-chart-alt-2'></i>
            </div>
        </div>
    </div>
    <div class="dashboard-card-4">
        <div class="px-4 py-3 d-flex justify-content-between align-items-start">
            <div>
                <h4>$ {{ $estimate_earn }}</h4>
                <p class="f-bold">
                    <strong class="text-secondary"> Estimate Earn </strong>
                </p>
            </div>
            <div class="circle-button d-flex justify-content-center align-items-center">
                <i class="bi bi-coin"></i>
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
                <h4>{{ $total_user }} </h4>
                <p class="f-bold">
                    <strong class="text-secondary"> Total User </strong>
                </p>
            </div>
            <div class="circle-button d-flex justify-content-center align-items-center">
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>

    <div class="dashboard-card-5">
        <div class="px-4 py-3 d-flex justify-content-between align-items-start">
            <div>
                <h4>{{ $pendding_booking }} </h4>
                <p class="f-bold">
                    <strong class="text-secondary"> Pendding Booking </strong>
                </p>
            </div>
            <div class="circle-button d-flex justify-content-center align-items-center">
                <i class="bi bi-clock"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-5">
        <h4 class="my-3 h4-2 text-danger">Last 5 Post</h4>

        <table class="table align-middle mb-0 bg-white table-border-dashboard">
            <thead class="bg-light">
                <tr class="text-center " style="background-color:  #ffcec1 ;">
                    <th>Post Title</th>
                    <th>Price Per Seat</th>
                    <th>Post By Vendor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentPost as $recentPost_data)

                <tr class="text-center">
                    <td>{{ $recentPost_data->name }}</td>
                    <td>$ {{ $recentPost_data->price }}</td>
                    <td>{{$recentPost_data->vendor_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-5 ">
        <h4 class="my-3 h4-2 text-warning">Latest Vendor</h4>

        <table class="table align-middle mb-0 bg-white table-border-dashboard">
            <thead class="bg-light">
                <tr class="text-center  " style="background-color:  #ffcec1;">
                    <th>Company Name</th>
                    <th>Tour Logo</th>
                    <th>Contact</th>
                    <th>User ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($last_vendor as $last_vendor_data)

                <tr class="text-center">
                    <td>{{$last_vendor_data->name}}</td>
                    <td>...</td>
                    <td>{{$last_vendor_data->contact}}</td>
                    <td>{{$last_vendor_data->user_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="row" >

    <div class="col-7">
        <h4 class="my-3 h4-2 text-danger">Lastest Booking</h4>

        <table class="table align-middle mb-0 bg-white table-border-dashboard">
        <thead class="" style="background-color:  #ffcec1 ;">
          <tr class="text-center">
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
                  {{ strtoupper(substr($booking->tour->vendor->name, 0, 3)) }}-{{ $booking->booking_number }}
              </i></strong>
            </td>
            <td>{{ $booking->tour->name }}</td>
            <td class="text-center">
              @if($booking->approved)
                <i class="bi bi-check-circle text-success"></i> <span>Approve</span> <!-- Icon for tick -->
              @else
                <i class="bi bi-clock text-warning"></i> <span>Pendding</span> <!-- Icon for pending -->
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

    <div class="col-5 ">
        <h4 class="my-3 h4-2 text-dark">Lastest Register Customer</h4>

        <table class="table align-middle mb-0 bg-white table-border-dashboard">
            <thead class="bg-light">
                <tr class="text-center  " style="background-color:  #ffcec1;">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($last_customer as $last_customer_data)

                <tr class="text-center">
                    <td>{{$last_customer_data->username}}</td>
                    <td>{{$last_customer_data->email}}</td>
                    <td>{{$last_customer_data->phone_number}}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    

</div>


</div>








@endsection