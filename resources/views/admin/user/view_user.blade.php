@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>User</h3>
    <a href="{{ url('create_user') }}" class="btn btn-success text-white">Create New User</a>
</div>

@if ($user->isEmpty())
    <p>No User. Please add one.</p>
@else
<div >
    <select name="role" id="" class="px-1 py-1">
        <option selected>Search by Role</option>
        <option value="cutomer">cutomer</option>
        <option value="vendor">vendor</option>
        <option value="admin">admin</option>
    </select>
</div>

    <table class="table mt-5 table-bordered">
        <thead class="thead-light  bg-dark text-white">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody>
            @foreach($user as $user_data)
                <tr>
                    <td>{{ $user_data->username }}</td>
                    <td>{{ $user_data->email }}</td>
                    <td>{{ $user_data->role }}</td>
                    <td>{{ $user_data->phone_number }} </td>
                    <td>
                        <a href="{{url('user/'.$user_data->id.'/edit')}}" class="btn btn-sm btn-light">
                            <i class="bi bi-pencil text-primary font-weight-bold"></i>
                        </a>
                        <a href="{{url('delete_user', $user_data->id)}}"class="btn btn-sm btn-light">
                            <i class="bi bi-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endif


@endsection


