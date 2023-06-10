@extends('admin_main')
@section('title', 'Home')
@section('content')


<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{ $user->username}}</h3>
  </div>
  <a href="{{ route('admins.view_user') }}" class="btn btn-primary text-white">Back</a>
</div>


<div class="border p-5 table_style radius">
    <form action="{{url('/user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="form-group col-12 my-2">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}"  required>
            </div>

            <div class="form-group col-12 my-2">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}"  required>
            </div>
        
            <div class="form-group col-6 my-2 ">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}"  required>
            </div>

            <div class="form-group col-6 my-2 ">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$user->phone_number}}"  required>
            </div>

            <div class="w-full mt-3">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Role for USER</label>
                <select name="role" id="" class="px-1 py-1">
                    <option selected>{{$user->role}}</option>
                    <option value="cutomer">cutomer</option>
                    <option value="vendor">vendor</option>
                    <option value="admin">admin</option>
                </select>
            </div>

        </div>
        <button type="submit" class="btn btn-success text-white mt-4">Update</button>
    </form>
</div>




@endsection