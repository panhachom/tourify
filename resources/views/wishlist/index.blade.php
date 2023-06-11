@extends('app')
@section('title', 'Home')
@section('content')


@include('components/navbar')
     <style>
        .wishlist{
            margin-top: 100px;
            min-height:100vh ;
        }
        .remove-btn {
            border: 2px solid black;
            text-align: center;
        }
        .addcart-btn{
            border: 2px solid #D5603F;
            text-align: center;
        }
        .full-table{
             border-color:black;
        }
        .card-button{
        font-size: 13px;
        border-radius: 20px;
        height: 35px;
        padding: 0 10px 0 10px ;
       
  }
     </style>


     @include('components/navbar') 

<div class="wishlist">
    <h2 class="mt-5 text-3xl font-medium text-center"><i class="fa thin fa-cart-shopping" style="mr-2.5"></i> My Wishlist Products</h2>
    <div class="mt-5 flex flex-col items-center">
      <!-- component -->
<section class="container px-4 mx-auto">
    <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-slate-300 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-xl text-black font-normal text-left   dark:text-gray-400 mr-5">
                                    Items
                                </th>
                                
                                <th scope="col" class="px-4 py-3.5 text-xl font-normal text-left rtl:text-right text-black dark:text-gray-400">
                                    Place Name
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-xl font-normal text-left rtl:text-right text-black dark:text-gray-400">
                                    Unit Price
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-xl font-normal text-left rtl:text-right text-black dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                           @foreach ($tours as $tour)
                            <tr>
                                
                               <td class="full-table whitespace-nowrap  px-6 py-4 font-medium dark:border-neutral-500">
                                  <img  clss="object-cover" width="185px" height="40px" src="{{ asset('images/tours/' . $tour->tour_images->first()->name) }}">
                               </td>
                               <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"> {{ $tour->name }}</td>
                               <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"> $ {{ $tour -> price }}</td> 
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                  <button type="button" class="text-white  bg-green-600  focus:outline-none focus:ring-4  font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 "><i class="fa thin fa-plus"></i> Booking Now</button>
                                  <form action="{{ route('favorite.remove',$tour->id) }}" method="POST"
                                                    onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-white bg-red-600  focus:outline-none focus:ring-4  font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                                        value="Delete">
                                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mt-6">
     @if(Session::has('success'))
        <div class=" bg-green-300 text-white px-2 py-4 w-full mt-4">
        {{ Session::get('success') }}
        </div>
    @endif
    </div>
</section>
    </div>
</div>

@include('components/footer')


@endsection