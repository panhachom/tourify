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

            .option_type {
                width: 90%;
                margin : auto ;
            }

            .button-content {
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            }
           

           
        </style>
  
       <div class="image">
            <p class="text-muny text-3xl pt-24 flex justify-center font-medium pb-10 "> {{ $tour->name }}</p>
      </div>

      <div class="slider-section mt-16">
        <div class="main-slider">
            <div class="slider">
            <div class="slides">
                <!--radio buttons start-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">

                @foreach($tour->tour_images as $index => $promotion)
                    <input type="radio" name="radio-btn" id="radio{{ $index + 1 }}">
                @endforeach

                @foreach($tour->tour_images as $index => $promotion)
                    <div class="slide{{ $index === 0 ? ' first' : '' }}">
                            <img src="{{ asset('images/tours/' . $promotion->name) }}" alt="Tour Image">    
                    </div>
                @endforeach
                <div class="navigation-auto">
                    @foreach($tour->tour_images as $index => $promotion)
                        <div class="auto-btn{{ $index + 1 }}"></div>
                    @endforeach
                </div>
            </div>
        
            </div>
        </div>

      


           
        <div class="flex justify-between items-center option_type pt-12">
            <div class="ps-10">
                    <!-- description -->
                    <div class=" ">
                        <p class="text-3xl font-medium text-muny pb-5">About this tours</p>
                    </div>
                    @foreach($tour->activities as $activity)
                        <div class="my-4">
                            <div>
                                <i class="fa-solid fa-check"></i>                       
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
                        <p class="text-3xl font-medium text-muny "> Price : $ {{ $tour->price }}</p>
                        <p class="mb-5"><small> Per Person</small></p>
                        <a href="{{ route('tour_list.booking.create', ['tour_list' => $tour->id]) }}" class="bg-primary px-3 py-2 text-white rounded-xl ">Create Booking</a>
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
        <x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />
		<x-card-component placeName="KompongThom" name="John Wick" description="Kompong thom  " price="130" />

        </div>

<script type="text/javascript">
    var counter = 1;
    setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 4){
        counter = 1;
        }
    }, 5000);
</script>

 
  
@include('components/footer')
@endsection
