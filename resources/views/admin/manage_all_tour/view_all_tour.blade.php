@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Tour Post Management</h3>
  </div>
</div>

    <table class="table mt-5 table-borderless table-hover table_style">
        <thead class="thead-light header_color text-black">
        <tr class="">
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Capacity</th>
            <th>Quantity</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <tbody>
    <div class="d-none">
      {{ $i= 1}}
      </div>
         @foreach($tour as $tour_data)
                <tr class="">
                    <td class="">{{ $i++}}</td>
                    <td>{{$tour_data->name}}</td>
                    <td>$ {{$tour_data->price}}</td>
                    <td>{{$tour_data->capacity}}</td>
                    <td>{{$tour_data->qty}}</td>
                    <td class="text-center">
                        <a href="{{url('/delete_tour_post', $tour_data->id)}}"class="btn btn-sm btn-light">
                            <i class="bi bi-trash text-danger"> Delete</i>
                        </a>
                    </td>
                </tr>
               @endforeach 


        </tbody>
    </table>




@endsection

