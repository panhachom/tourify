<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <style>

    </style>
</head>

<body>

    @extends('app')
    @section('title', 'Home')
    @section('content')
    @include('components/navbar')
    <!-- <div class="main-content"> -->
    <!-- <div class="px-4 md:px-10 lg:px-20 section-4 mb-10"> -->
    <!-- <div class="place-items-center grid grid-cols-1 md:grid-cols-2 gap-8 p-4 md:p-8"> -->

    <!-- </div> -->
    <div>
        <p class="text-3xl font-medium text-muny pt-10 pl-24 flex flex-col">Your Booking History </p>
        <div class="pl-24 pt-5">
            <form method="GET" class="flex gap-5 items-center" action="/filter">
                <div>
                    <label for="end-date">Search by date</label>
                    <input type="date" id="date" name="edate" class="date-picker border-2" value="">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Filter
                </button>
            </form>
        </div>
        <div class="mt-16 flex justify-center gap-10 items-center flex-wrap px-10 w-full pb-10">

            @foreach($tours as $tour)
            <x-card-component-for-history placeName="{{ $tour->vendor->name }}" name="{{ $tour->name }}"
                description="{{ $tour->description }}" price="{{ $tour->price }}"
                image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
                id="{{ $tour->id }}" />
            @endforeach


        </div>
        <p class="text-3xl font-medium text-muny pt-10 text-center">Popular Tours</p>
        <p class="text-center pt-5 text-slate-00">Don't miss your chance to experience the best. Book your spot on our
            popular tour today</p>
        <div class="mt-10 flex justify-center gap-10 items-center flex-wrap px-10 w-full pb-10">
            @foreach($tours as $tour)
            <x-card-component placeName="{{ $tour->vendor->name }}" name="{{ $tour->name }}"
                description="{{ $tour->description }}" price="{{ $tour->price }}"
                image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
                id="{{ $tour->id }}" />
            @endforeach
        </div>
    </div>
    </div>
    </div>

    @endsection

</body>

</html>