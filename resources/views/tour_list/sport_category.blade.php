
@extends('app')
     @section('title', 'Home')
     @section('content')

	
	<div class="bg-secondary">
		<nav class=" z-10 flex justify-center space-x-4 px-10 py-6 mt-16 bg-secondary ">
		<a href="{{ route('tour_list.index') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-campground " style="color: #D5603F;" ></i> All Tours</a>
		<a href="{{ route('sport-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-city" style="color: #D5603F;"></i> Sport</a>
		<a href="{{ route('adventure-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-person-biking" style="color: #D5603F;"></i>Adventure</a>
		<a href="{{ route('cultural-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-brands fa-react" style="color: #D5603F;"></i> Cultural</a>
		<a href="{{ route('food_and_drink-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2 "><i class="fa-regular fa-wine-glass-empty" style="color: #D5603F; "></i> Food and Drink</a>
		<a href="{{ route('history-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-brands fa-react" style="color: #D5603F;"></i> History</a>

		</nav>
    </div>

	<div class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
	@foreach($tours as $tour)
    <x-card-component
        placeName="{{ $tour->vendor->name }}"
        name="{{ $tour->name }}"
        description="{{ $tour->description }}"
        price="{{ $tour->price }}"
        image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
		id="{{ $tour->id }}"
		discount="{{ $tour->discount_price }}"

    />
   @endforeach
	</div>
	<div></div>



	
	@endsection
