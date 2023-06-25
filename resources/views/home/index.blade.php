@extends('app')
@section('title', 'Home')
@section('content')


<div class="">

<?php 
    use App\Models\Promotion;
    $promotions = $promotions = Promotion::where('status', true)->get();

?>
    
    @if ($promotions === null || $promotions->isEmpty())
     <div></div>
    @else
    <p id="demo none"></p>

    <div class="flex flex-col m-auto p-auto w-full back-image mt-20 p-16 d-none   ">
        <h1 class="flex py-5 justify-center items-center lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-black text-center"></h1>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
            <div class="flex flex-nowrap lg:ml-10 md:ml-5 ml-1 ">
            @foreach($promotions as $index => $promotion)
                <div class="inline-block px-3 content">
                <a href="{{ route('customer_promotion.show', ['promotion' => intval($promotion->id)]) }}">
                    <img  src="{{ asset('images/promotions/' . $promotion->image_name) }}" class=" promotion-card-width    overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                </a>
                </div>
            @endforeach
            </div>
            </div>
    </div>

        <script>
            var promotions = @json($promotions);
            var hasExpiredPromotion = false;

            promotions.forEach(function($promotion) {
                var startDateTime = "{{ $promotion->start_date }}"; 
            var endDateTime = "{{ $promotion->end_date }}";
            var countDownDate = new Date(endDateTime).getTime();

            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
            
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Add leading zeros to the values
                days = days.toString().padStart(2, '0');
                hours = hours.toString().padStart(2, '0');
                minutes = minutes.toString().padStart(2, '0');
                seconds = seconds.toString().padStart(2, '0');

                document.getElementById("demo").innerHTML = `
                    <div class="countdown-timer ">
                        <div class="group">
                            <div class="value days">${days}</div>
                            <div class="text">Days</div>
                        </div>
                        <div class="group">
                            <div class="value hours">${hours}</div>
                            <div class="text">hours</div>
                        </div>
                        <div class="group">
                            <div class="value minutes">${minutes}</div>
                            <div class="text">min</div>
                        </div>
                        <div class="group">
                            <div class="value seconds">${seconds}</div>
                            <div class="text">sec</div>
                        </div>
                    </div>
                `;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    window.location.reload();
                    location.replace('/');
                    
                }
            }, 1000);

        });

           
        </script>
    @endif




<!-- Create By Joker Banny -->
<form action="{{ route('search') }}" method="GET" class="mt-12 flex justify-center items-center px-20">

<div class=" mt-12 flex justify-center items-center px-20">
  <div class="space-y-10">
    <div class="flex mt-12 items-center p-6 space-x-6 bg-white   shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500 ">
      <div class="flex bg-gray-100 p-4 w-72 space-x-4 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input class="bg-gray-100 outline-none" type="text" placeholder="Search Tour" name= 'search' />
      </div>
      <div class="flex py-3 px-4 rounded-lg text-gray-500 font-semibold cursor-pointer">
        <button  type="button" data-dropdown-toggle="dropdown-2" >All categorie</button>
        <div class="hidden  " id="dropdown-2">
							<ul class="py-1 w-72 mt-6 margin-left bg-white  text-gray-500" aria-labelledby="dropdown-2">
							    <li class="px-3 py-1 shadow-sm"> Sport</li>
                  <li class="px-3 py-1 shadow-sm"> Adventure</li>
							    <li class="px-3 py-1 shadow-sm"> Cultural</li>
							    <li class="px-3 py-1 shadow-sm"> Food and Drink</li>
							    <li class="px-3 py-1 shadow-sm"> History</li>
							</ul>
						</div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
      <button class="bg-primary  text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer">
        <span>Search</span>
    </button>
    </div>

  </div>
</div>
</form>

















  <!-- SECTION Slider  -->

    <!-- SECTION 2 -->
    <div class="px-40 section-2-content flex flex-col lg:flex-row gap-12 lg:gap-0 lg:justify-evenly items-center lg:items-center mt-28 ">
        <div class="flex-1">
            <div class="text-3xl font-bold text-black">
                Get Experience <br>Which are fun
            </div>
            <div class="text-sm font-light my-8">
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with 
              it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
               model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like
            </div>
        </div>
        <div class="flex-1"></div>
        <div class="flex-1">
            <div class="flex gap-2 mb-2">
                 <a href="{{ route('sport-category') }}">
                  <div class="link-tour-card bg-primary">
                      <div class="flex justify-center items-center w-full h-full">
                          <div class="flex flex-col justify-center items-center gap-2">
                              <i class="fa-regular fa-building"></i>  
                              <div class=" font-medium">Sport</div>
                          </div>
                      </div>
                  </div> 
                 </a>  
                 <a href="{{ route('adventure-category') }}">
                    <div class="link-tour-card bg-btn3">
                        <div class="flex justify-center items-center w-full h-full">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <i class="fa-regular fa-building"></i>  
                                <div class=" font-medium">Adventure</div>
                            </div>
                        </div>
                    </div>  
                 </a>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('history-category') }}">
                  <div class="link-tour-card bg-btn4">
                      <div class="flex justify-center items-center w-full h-full">
                          <div class="flex flex-col justify-center items-center gap-2">
                              <i class="fa-regular fa-building"></i>  
                              <div class=" font-medium">History</div>
                          </div>
                      </div>
                  </div>  
                </a>
                <a href="{{ route('food_and_drink-category') }}">
                  <div class="link-tour-card bg-btn2">
                      <div class="flex justify-center items-center w-full h-full">
                          <div class="flex flex-col justify-center items-center gap-2">
                              <i class="fa-regular fa-building"></i>  
                              <div class=" font-medium">Food and Drink</div>
                          </div>
                      </div>
                  </div> 
                </a>
          
            </div>
        </div>
      
        
    </div>

    <div class="px-40 mt-20 section-4 mb-10">
        <div class="flex justify-between items-center mb-16 ">
            <div class="text-3xl font-bold">Most Popular</div>
            <div class=" text-sm font-thin">Some of the most popular destinations for<br> you visit with a view the beautiful one.</div>
            <button class="px-7 py-3 m-1">View More</button>
        </div>

        <div class="flex justify-center items-center flex-wrap gap-10">
        @foreach($popularTours as $tour)

            <x-card-component
            placeName="{{ $tour->vendor->name }}"
            name="{{ $tour->name }}"
            description="{{ $tour->description }}"
            price="{{ $tour->price }}"
            image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
            id="{{ $tour->id }}"
            discount=" {{ $tour->discount_price}}"
            />		
        @endforeach
        </div>
    </div>
    <div class="px-40 mt-20 section-4 mb-10">
        <div class="flex justify-between items-center mb-16 ">
            <div class="text-3xl font-bold">Recently Add</div>
            <div class=" text-sm font-thin">Some of the most popular destinations for<br> you visit with a view the beautiful one.</div>
            <button class="px-7 py-3 m-1">View More</button>
        </div>

        <div class="flex justify-center items-center flex-wrap gap-10">
        @foreach($latetours as $tour)
            <x-card-component
            placeName="{{ $tour->vendor->name }}"
            name="{{ $tour->name }}"
            description="{{ $tour->description }}"
            price="{{ $tour->price }}"
            image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
            id="{{ $tour->id }}"
            />		
            @endforeach
        </div>
    </div>

    <!-- This is an example component -->










</div>
@endsection


