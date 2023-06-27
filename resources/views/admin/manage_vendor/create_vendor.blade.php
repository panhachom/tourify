@extends('admin_main')
@section('title', 'Home')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>Create New Vendor</h3>
    <a href="{{ route('admins.view_vendor') }}" class="btn btn-primary text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form action="{{url('/vendor_store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="name" required>
            </div>

            <div class="form-group col-12 my-2">
                <label for="email">About Us</label>
                <input type="text" class="form-control" id="about_us" name="about_us" required>
            </div>

            <!-- <div class="form-group col-6 my-2 ">
                <label for="password">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div> -->

            <div class="form-group col-6 my-2 ">
                <label for="phone_number">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>

            <div class="w-full mt-3">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select User_ID for Vendor</label>

                <select name="user_id" id="" class="px-1 py-1">
                    <option selected>Choose a Name for Vendor</option>
                    @foreach($vendor as $vendor_data)
                    <option name="user_id" value="{{$vendor_data->id}}" class="text-black">{{$vendor_data->username}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-6 my-2 ">
                <label for="phone_number">Logo</label>
                <input type="file" class="form-control" id="contact" name="logo" required>
            </div>

        </div>
        <button type="submit" class="btn btn-success text-white mt-4">Create Vendor</button>
    </form>
</div>


@endsection