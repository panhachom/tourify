@include('layout.sidebar')
<div class="p-4 sm:ml-64">

    <a href="{{url('create_user')}}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Create User</a>

    <div class="flex items-center justify-between pb-4">

        <div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <!-- <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div> -->
            <a href="/show_customer" class="p-3">Customer</a>
            <a href="/show_vendor" class="p-3">Vendor</a>
            <a href="/show_admin"class="p-3">Admin</a>
            <a href="/view_user">Back</a>

        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-red-600 text-center">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user_data)
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-primary whitespace-nowrap text-center ">{{$user_data->id}}</th>
                <td class="px-6 py-4 text-center">{{$user_data->username}}</td>
                <td class="px-6 py-4 text-center">{{$user_data->email}}</td>
                <td class="px-6 py-4 text-center">{{$user_data->role}}</td>
                <td class="px-6 py-4 text-center">{{$user_data->phone_number}}</td>
                <td class="px-6 py-4 text-center">
                    <a href="{{url('user/'.$user_data->id.'/edit')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="{{url('delete_user', $user_data->id)}}" class=" ml-2 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
            @endforeach



        </tbody>
    </table>
</div>