@vite('resources/css/app.css')
    @extends('app')
    @section('title', 'Tour')
    @section('content')
        
     <title>Detailpage</title>

       <div>
            <p class="text-muny text-3xl pt-6 lg:pt-24 flex justify-center font-medium pb- md:pb-10 "> {{ $tour->name }}</p>
      </div>

      @if($tour->tour_images->isEmpty())
      <span></span>
      @else
      <div class="">
        <div>
            <div class="slides justify-center items-start mt-10 md:mt-0 w-full">
                <img src="{{ asset('images/tours/' . $tour->tour_images->first()->name) }}" class="img-heigth" alt="Tour Image" >    
            </div>
        </div>

        <div class="px-0 lg:px-48 flex flex-col m-auto p-auto">
            <h1 class="flex py-5 justify-center items-center lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-black text-center"></h1>
                <div class="">
                    <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                        <div class="flex flex-nowrap lg:ml-10 md:ml-5 ml-1  ">
                            @foreach($tour->tour_images as $index => $promotion)
                                <div class="inline-block px-1  ">
                                    <img src="{{ asset('images/tours/' . $promotion->name) }}" class="image-width min-w-40 overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out" onclick="showBigImage(this)">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        @endif

        <div class="ps-10 option_type mt-24">
            <p class="text-3xl font-medium text-muny pb-5">Overview</p>
            <div class="pe-0 lg:pe-16">{{$tour->description}}</div>
        </div>
           
        <div class="flex justify-between flex-col md:flex-row  items-center option_type pt-12">
            <div class="ps-10">
                    <!-- description -->
                  
                    <div class=" ">
                        <p class="text-3xl font-medium text-muny pb-5">About this tours</p>
                    </div>
                    @foreach($tour->activities as $activity)
                        <div class="my-4">
                            <div>
                                <i class="fa-solid fa-check text-sm"></i>                       
                                <a class="font-medium px-2 ">{{ $activity->name }}</a><br>
                                <a class="ps-6 text-gray-600">{{ $activity->description }}</a><br>
                            </div>
                        </div>
                    @endforeach

                    <div class="my-4">
                        <div>
                            <i class="fa-solid fa-flag text-primary"></i>
                                <a class="font-medium px-2 ">
                                @foreach($tour->countries as $country)
                                    {{ $country->country }}
                                @endforeach     
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class=" p-12 mb-5 button-content ">
                        <p class="text-3xl font-medium text-muny "> 
                         @if($tour->discount_price != '')
                            Price :
                            <span class="text-red-600 font-bold"> $ {{ $tour->discount_price }}</span>    
                            <span class="text-lg line-through">$ {{ $tour->price }}</span>
                        @else 
                            <p class="text-3xl font-medium text-muny "> Price : $ {{ $tour->price }}</p>
                        @endif
                       </p>
                        <p class="mb-5"><small> Per Person</small></p>
                        <a href="{{ route('tour_list.booking.create', ['tour_list' => $tour->id]) }}" class="bg-primary px-3 py-2 text-white rounded-xl ">Book Tour</a>
                    </div>
                    @if($tour->tour_dates->isEmpty())
                      <span></span>
                    @else 
                    <div class=" p-12 mb-5 button-content ">
                            <p class="text-3xl font-medium text-muny mb-1 "> Tour Date</p>
                            @foreach($tour->tour_dates as $date)
                                <div class="my-1"> {{ \Carbon\Carbon::parse($date->start_date)->format('d F, Y') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d F, Y') }}</div>
                            @endforeach     
                    </div>
                    @endif
                </div>
        </div>
            
        <div class="pl-28 mt-12 ">
            <p class="text-3xl font-medium text-muny">Related Tours</p>
        </div>
        <div class="mt-24 flex justify-center gap-10 items-center flex-wrap px-10 w-full pb-10">
            @foreach($latetours as $tour)
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

<script type="text/javascript">

    function showBigImage(element) {
        var bigImage = document.querySelector('.slides');
        bigImage.innerHTML = '<img src="' + element.src + '" class="img-heigth" alt="Tour Image">';
    }
</script>

 
  

@endsection