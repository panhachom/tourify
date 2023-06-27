@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Vendors</h3>
  </div>
    <a href="{{ url('create_vendor') }}" class="btn btn-success text-white">Create New Vendor</a>
</div>

    <table class="table mt-5 table-borderless table-hover table_style">
        <thead class="thead-light header_color text-black">
        <tr class="text-center">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <!-- <th>About US</th> -->
            <th>Contact</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody>
        <div class="d-none">
      {{ $i= 1}}
      </div>
           @foreach($vendor as $vendor_data)
                <tr class="text-center ">
                    <td>{{ $i++}}</td>
                    <td>{{$vendor_data->name}}</td>
                    <td>{{$vendor_data->user->email}}</td>         
                    <td>{{$vendor_data->contact}}</td>
                    <td><img src="/vendor/{{$vendor_data->logo}}" alt="" width="50px" height="50px" class="ml-5"></td>
                    <td>
                    <a href="{{url('vendor/'.$vendor_data->id.'/edit')}}" class="btn btn-sm btn-light">
                            <i class="bi bi-pencil text-primary font-weight-bold  "> Edit</i>
                        </a>
                        <a href="{{url('delete_vendor', $vendor_data->id)}}"class="btn btn-sm btn-light">
                            <i class="bi bi-trash text-danger"> Delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            

        </tbody>
    </table>




@endsection


