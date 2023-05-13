@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="p-4 sm:ml-64">
        <h1 class="text-red-700">testing</h1>
        <a href="{{ route('logout.perform') }}" class="btn btn-outline-dark  me-2">Logout</a>
</div>


@endsection
    

