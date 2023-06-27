
	 @extends('app')
     @section('title', 'Tour')
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

	<div class=" flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
    @if (reset($tours) == 'result') 
    <svg height="100" style="overflow:visible;enable-background:new 0 0 32 32" viewBox="0 0 32 32" width="32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g id="Error_1_"><g id="Error"><circle cx="16" cy="16" id="BG" r="16" style="fill:#D72828;"/><path d="M14.5,25h3v-3h-3V25z M14.5,6v13h3V6H14.5z" id="Exclamatory_x5F_Sign" style="fill:#E6E6E6;"/></g></g></g></svg>
    <p>Tour Not found</p>
    <hr>

    @else

    
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
    
    @endif

	</div>
	<div></div>


	
	@endsection
