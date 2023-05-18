@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    
    <a href="/view_vendor" class="btn btn-success text-white">Back</a>
</div>


<div class="border p-5 rounded">
    <form action="{{url('/vendor/'.$vendor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="form-group col-12 my-2">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="name"  value="{{$vendor->name}}">
            </div>

            <div class="form-group col-12 my-2">
                <label for="email">About Us</label>
                <input type="text" class="form-control" id="about_us" name="about_us" value="{{$vendor->about_us}}">
            </div>

            <div class="form-group col-6 my-2 ">
                <label for="password">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$vendor->email}}">
            </div>

            <div class="form-group col-6 my-2 ">
                <label for="phone_number">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{$vendor->contact}}">
            </div>
            <div class="w-full mt-3">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select User_ID for Vendor</label>

                <select name="user_id" id="" class="px-1 py-1">
                    <option selected>{{$vendor->user->username}}</option>
                    @foreach($user_ids as $data)
                    <option name="user_id" value="{{$data->id}}" class="text-black">{{$data->username}}</option>
                    @endforeach
                </select>

            </div>

      
            <!-- <div class="form-group col-6 my-2 ">
                <label for="phone_number">Update Logo</label>
                <input type="file" class="form-control" id="contact" name="logo" required>
            </div> -->

            <div class="w-full mt-5">
                  <label for="current_image" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Current Logo:</label>
                  <img src="/vendor/{{$vendor->logo}}" alt="" width="200px" class="m-auto">
              </div>
        </div>
        <button type="submit" class="btn btn-success text-white mt-4">Update</button>
    </form>
</div>




@endsection