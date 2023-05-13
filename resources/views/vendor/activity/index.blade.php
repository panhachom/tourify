@extends('vendor_main')
@section('title', 'Home')
@section('content')


<div class="p-4 sm:ml-64">
    
        <a href="{{ route('vendor.activity.create', ['vendor' => 1]) }}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Create Activity</a>

    <div>
        
        <!-- <div> -->
        <!-- </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div> -->
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" >
                    Activity ID
                </th>
                <th scope="col" >
                    Name
                </th>
                <th scope="col" >
                    Description
                </th>
                <th scope="col" >
                    Created Date
                </th>
                <th scope="col">
                    Edited Date
                </th>
                <th scope="col" >
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($activities as $activity_item)
            <tr>
                <th scope="row" >{{$activity_item->id}}</th>
                <td >{{$activity_item->name}}</td>
                <td > {{$activity_item->description}} </td>
                <td >{{$activity_item->created_at -> format('d/m/Y')}}</td>
                <td >{{$activity_item->updated_at -> format('d/m/Y')}}</td>
                <td >
                </td>
            </tr>
             @endforeach
           
           

        </tbody>
    </table>


    
</div>

</div>


@endsection