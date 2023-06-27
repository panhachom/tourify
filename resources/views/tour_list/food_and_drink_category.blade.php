
@extends('app')
     @section('title', 'Home')
     @section('content')

	
	 <div class="bg-secondary">
		<nav class=" z-10 flex justify-center space-x-4 px-10 py-6 mt-16 bg-secondary ">
		<a href="{{ route('tour_list.index') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"> <i class="fa-solid fa-border-all text-primary"></i></i> <span class="text-lg ml-2">All Tours</span></a>
		<a href="{{ route('sport-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid  fa-person-biking  text-primary " ></i><span class="text-lg ml-2">Sport</span></a>
		<a href="{{ route('adventure-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-mountain-sun text-primary"></i><span class="text-lg ml-2">Adventure</span></a>
        
		<a href="{{ route('cultural-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-brands fa-react text-primary"></i><span class="text-lg ml-2">Cultural</span></a>
		<a href="{{ route('food_and_drink-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2 "><i class="fa-solid fa-glass-water-droplet text-primary"></i><span class="text-lg ml-2">Food and Drink</span></a>
		<a href="{{ route('history-category') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-bridge text-primary"></i><span class="text-lg ml-2">History</span></a>
       	</nav>       
    </div>

	@if($tours->isNotEmpty())
	<div class=" flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
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

	@else 

	<div class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full h-96">
		<div>No Tour for this category</div>
	</div>

	@endif
	<div></div>



	
	@endsection
