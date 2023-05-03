<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ListTour</title>
	 @extends('app')
     @section('title', 'Home')
     @section('content')
	<style type="text/tailwindcss">
	</style>
</head>
<body>
	@include('components/navbar')
	
	<div class="fixed z-10 bg-secondary w-full justify-center">
		<nav class="flex justify-center space-x-4 px-10 py-6 ">
		<a href="/AllTours" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-campground " style="color: #D5603F;" ></i> All Tours</a>
		<a href="/CityTours" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-city" style="color: #D5603F;"></i> City Tours</a>
		<a href="/CityTours" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-solid fa-person-biking" style="color: #D5603F;"></i> City Tours</a>
		<a href="/CulturalTours" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2"><i class="fa-brands fa-react" style="color: #D5603F;"></i> Cultural Tours</a>
		<a href="/CulturalTours" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900 hover:underline underline-offset-8 uderline decoration-2 "><i class="fa-regular fa-wine-glass-empty" style="color: #D5603F; "></i> Cultural Tours</a>
		</nav>
    </div>

	<div class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
	</div>
	<div></div>



 <section class="footer ">
	@include('components/footer')
 </section>
</body>
</html>

