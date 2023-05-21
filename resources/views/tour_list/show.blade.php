<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/6fa5d10da9.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @extends('app')
    @section('title', 'Home')
    @section('content')
        @include('components/navbar')
        <title>Detailpage</title>
        <style>
            .image .mx-auto{
                width: 83%;
                height: 450px;
                overflow: hidden;
                object-fit: cover;
            }
            img{
                border-radius: 10px;
            }
            .small_img{
                width: 7rem;
                height: 7rem;
                object-fit: cover;
                display: flex;
                column-gap: 10px;
                position: absolute;
                bottom: 1px;
                left: 35%;
                transform: translateX(-50%);
            }

            button {
                font-size: 18px;
                border-radius: 18px;
                height: 45px;
                width: 150px;
            }
        </style>
    </head>

    <body>
        {{-- <div class="image">
            <p class="text-muny text-3xl pt-24 flex justify-center font-medium pb-10 "> {{ $tour->name }}</p>
            <img src="{{ asset('images/tours/' . $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null) }}" alt="Tour Image">
        </div>
            <div class="small_img">
            @foreach($tour->tour_images as $image)
                 <img src="{{ asset('images/tours/' . $image->name) }}" alt="Tour Image">
            @endforeach

            </div> --}}
            <div class="image">
                <p class="text-muny text-3xl pt-24 flex justify-center font-medium pb-10 ">{{ $tour->name }}</p>

            <div id="indicators-carousel" class="relative w-full mx-auto" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                     @foreach($tour->tour_images as $image)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/tours/' . $image->name) }}" alt="Tour Image" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                     @endforeach

               </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                     @foreach($tour->tour_images as $image)
                        <img src="{{ asset('images/tours/' . $image->name) }}" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"  alt="Tour Image" class="w-28 h-28 absolute block" class="w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                     @endforeach
                    <img class="w-28 h-28" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0" src="https://images.saymedia-content.com/.image/t_share/MTc0NDk1Mjk1MTA5ODY2ODU2/magical-angkor-wat.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <img class="w-28 h-28" aria-current="true" aria-label="Slide 2" data-carousel-slide-to="1" src="https://www.thebrokebackpacker.com/wp-content/uploads/2019/08/shutterstock_351555083.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <img class="w-28 h-28" aria-current="true" aria-label="Slide 3" data-carousel-slide-to="2" src="https://www.travelanddestinations.com/wp-content/uploads/2017/05/Tuk-Tuks-in-Siem-Reap.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <img class="w-28 h-28" aria-current="true" aria-label="Slide 4" data-carousel-slide-to="3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrh-IX9iA7PDr6nyK54LaeIa3IRzGNTmUu6w&usqp=CAU" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>


        <div class="p-3">
            <!-- description -->
            <div class="pt-10 pl-28 ">
                <p class="text-3xl font-medium text-muny pb-5">About this tours</p>
            </div>
            @foreach($tour->activities as $activity)
                <div class="pl-28 py-5">
                    <div>
                        <i class="fa-solid fa-check"></i>                       
                        <a class="font-medium px-2 ">{{ $activity->name }}</a><br>
                        <a class="px-8 text-gray-600">{{ $activity->description }}</a><br>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-10 pl-28 mb-5 ">
                <p class="text-3xl font-medium text-muny pb-5"> Price : $ {{ $tour->price }}</p>
                <a href="{{ route('tour_list.booking.create', ['tour_list' => $tour->id]) }}">Create Booking</a>


        </div>
        <div class="pl-28 ">
            <p class="text-3xl font-medium text-muny">Related Tours</p>
        </div>
        <div class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 w-full pb-10">
        <x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    </body>
    @include('components/footer')
@endsection
</html>