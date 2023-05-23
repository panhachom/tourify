
	 @extends('app')
   @section('title', 'Home')
   @section('content')
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	@include('components/navbar')
	<div class="bg-secondary" >
		<nav class=" z-10 flex justify-center space-x-4 px-10 py-6 mt-16 bg-secondary ">
		  <a href="" id="Alltour"  class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-campground " style="color: #D5603F;" ></i>Advantures</a>
		  <a href="" id="city1"  class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-city" style="color: #D5603F;"></i> Sport</a>
		  <a href="" id="city2" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-person-biking" style="color: #D5603F;"></i> Cultural</a>
		  <a href="" id="cultural1"  class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-brands fa-react" style="color: #D5603F;"></i> Food and Drink</a>
		  <a href="" id="cultural2"  class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2 "> <i class="fa-solid fa-chess" style="color: #c15710;"></i> History</a>
		</nav>                  
    </div>

	<div id="content"  class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
		 @foreach ($tours as $tour )
		  <x-card-component  placeName="{{ $tour->vendor->name }}" name="{{ $tour->name }}" description="{{ $tour->description }} " price="{{ $tour->price }}" id="{{ $tour->id }}"/>
		 @endforeach
	</div>

	@include('components/footer')
	@endsection

