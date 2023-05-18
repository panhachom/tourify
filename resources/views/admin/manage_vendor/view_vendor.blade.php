@extends('admin_main')
@section('title', 'Home')
@section('content')


<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Vendor Management</h3>
    <a href="{{ url('create_vendor') }}" class="btn btn-success text-white">Create New Vendor</a>
</div>

<div >
    
</div>

    <table class="table mt-5 table-striped">
        <thead class="thead-light  bg-light  text-black">
        <tr class="text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <!-- <th>About US</th> -->
            <th>Contact</th>
            <th>Logo</th>
            <th>User ID</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody>
           @foreach($vendor as $vendor_data)
                <tr class="text-center ">
                    <td>{{$vendor_data->id}}</td>
                    <td>{{$vendor_data->name}}</td>
                    <td>{{$vendor_data->email}}</td>         
                    <td>{{$vendor_data->contact}}</td>
                    <td><img src="/vendor/{{$vendor_data->logo}}" alt="" width="100px" class="ml-5"></td>
                    <td>{{$vendor_data->user_id}}</td>
                    <td>
                    <a href="{{url('vendor/'.$vendor_data->id.'/edit')}}" class="btn btn-sm btn-light">
                            <i class="bi bi-pencil text-primary font-weight-bold p-3 "></i>
                            <span><p>Edit</p></span>
                        </a>
                        <a href="{{url('delete_vendor', $vendor_data->id)}}"class="btn btn-sm btn-light">
                            <i class="bi bi-trash text-danger"></i>
                            <span><p>Delete</p></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            

        </tbody>
    </table>




@endsection


