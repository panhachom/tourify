@extends('admin_main')
@section('title', 'Home')
@section('content')


<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Tour Post Management</h3>
    <!-- <a href="{{ url('create_vendor') }}" class="btn btn-success text-white">Create New Vendor</a> -->
</div>

<div >
    
</div>

    <table class="table mt-5 table-striped">
        <thead class="thead-light  bg-light  text-black">
        <tr class="text-center">
            <th>POST ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Capacity</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody>
         @foreach($tour as $tour_data)
                <tr class="text-center ">
                    <td class="text-primary">{{$tour_data->id}}</td>
                    <td>{{$tour_data->name}}</td>
                    <td>{{$tour_data->description}}</td>         
                    <td>$ {{$tour_data->price}}</td>
                    <td>{{$tour_data->capacity}}</td>
                    <td>{{$tour_data->qty}}</td>
                    <td>
                    <a href="{{url('tour/'.$tour_data->id.'/edit')}}" class="btn btn-sm btn-light">
                            <i class="bi bi-pencil text-primary font-weight-bold p-3 "></i>
                            <span><p>Edit</p></span>
                        </a>
                        <a href="{{url('/delete_tour_post', $tour_data->id)}}"class="btn btn-sm btn-light">
                            <i class="bi bi-trash text-danger"></i>
                            <span><p>Delete</p></span>
                        </a>
                    </td>
                </tr>
               @endforeach 
            

        </tbody>
    </table>




@endsection


