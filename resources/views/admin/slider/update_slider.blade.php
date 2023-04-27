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
<form action="{{url('/slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-4xl font-bold text-third dark:text-white">Update Slider</h2>
      
 
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                  <input type="text" name="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$slider->title}}" required="">
              </div>

              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Description</label>
                  <textarea name="description" rows="8" class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >{{$slider->description}}</textarea>
              </div>
                  <label for="image" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Browse New Image:</label>
                  <input type="file" name="image" class="mt-5">
              <div class="w-full">
                  <label for="start_date" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Start Date</label>
                  <input type="date" name="start_date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$slider->start_date}}" required="">
              </div>
              <div class="w-full">
                  <label for="end_date" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">End Date</label>
                  <input type="date" name="end_date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$slider->end_date}}" required="">
              </div>
                  <label>Status :</label>
                  <input type="checkbox" name="status" style="width: 30px; height: 30px;">
                  <p> check = hidden, Uncheck = visible</p>
              <div class="w-full mt-5">
                  <label for="current_image" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Current Image:</label>
                  <img src="/slider/{{$slider->image}}" alt="" width="200px" class="m-auto">
              </div>
          </div>
          <button type="submit" value="Update" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-lg font-medium text-center text-black bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Update Slider
          </button>
          <a href="/view_slider" class=" ml-5 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-lg font-medium text-center text-black bg-secondary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Back</a>
      </form>
  </div>
</section>
  <p>testing update</p>
</div>

</div>
</body>
</html>

