@extends('admin_main')
@section('title', 'Home')
@section('content')




<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Dashboard Management</h3>
</div>

<div class="row p-5 ">
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3 text-center rounded-lg transform transition duration-500 hover:scale-110 border-white">
            <label for="" class="text-xl">Total Post</label>
            <h1>{{ $total_post }}</h1>
            <a href="/view_all_post" class="text-white no-underline">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3 text-center rounded-lg transform transition duration-500 hover:scale-110 border-white">
            <label for="" class="text-xl">Total User</label>
            <h1>{{ $total_user}}</h1>
            <a href="/view_user" class="text-white no-underline">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3 text-center rounded-lg transform transition duration-500 hover:scale-110 border-white">
            <label for="" class="text-xl">Total Admin</label>
            <h1>{{$total_admin}}</h1>
            <a href="" class="text-white no-underline">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3 text-center rounded-lg transform transition duration-500 hover:scale-110 border-white">
            <label for="" class="text-xl">Total Vender</label>
            <h1>{{$total_vendor}}</h1>
            <a href="" class="text-white no-underline">View</a>
        </div>
    </div>
   

</div>


<div>
    <canvas id="myChart"></canvas>
</div>
<!-- <div>
    <canvas id="myline"></canvas>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    let vendor = " {{$total_vendor}}";
    let admin = "{{$total_admin}}";
    let customer = "{{$total_customer}}"
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Admin', 'Vendor', 'Customer'],
            datasets: [{
                label: 'User of System',
                data: [admin, vendor, customer],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx1 = document.getElementById('myline');
    
    let post_by_month = "{{$post_by_months}}"
    new Chart(ctx1, {
        
        type: 'line',
        data: {
            labels: ['1','2'],
            datasets: [{
                label: 'total post',
                data: [post_by_month],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    

    
    

    
</script>


@endsection