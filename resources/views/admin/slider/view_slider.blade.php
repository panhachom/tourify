<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
@include('layout.sidebar')
<div class="p-4 sm:ml-64">
    
        <a href="{{url('create_slider')}}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Create slider</a>

    <div class="flex items-center justify-between pb-4">
        
        <div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="p-4">
                     Hidden
                </th>
                <th scope="col" class="px-6 py-3 text-red-600 text-center">
                    Slider ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Title
                </th>
                <th scope="col" class="px-6 py-3  text-center ">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Image
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    End Date
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($slider as $slider_item)
            <tr class="bg-white border-b ">
                
                <td class="w-4 p-4">
                    <div class="flex items-center justify-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                
                <th scope="row" class="px-6 py-4 font-medium text-primary whitespace-nowrap text-center ">{{$slider_item->id}}</th>
                <td class="px-6 py-4 text-center">{{$slider_item->title}}</td>
                <td class="px-6 py-4 text-center"> {{$slider_item->description}} </td>
                <td class="px-6 py-4 text-center"><img src="/slider/{{$slider_item->image}}" alt="" width="100px"></td>
                <td class="px-6 py-4 text-center">{{$slider_item->start_date}}</td>
                <td class="px-6 py-4 text-center">{{$slider_item->end_date}}</td>
                <td class="px-6 py-4 text-center">
              
                    <a href="{{url('slider/'.$slider_item->id.'/edit')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="{{url('delete_slider', $slider_item->id)}}" class=" ml-2 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    
                </td>
            </tr>
             @endforeach
           
           

        </tbody>
    </table>
</div>

</div>
</body>
</html>

