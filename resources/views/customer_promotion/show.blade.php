@extends('app')
@section('title', 'Home')
@section('content')
<nav class=" z-10 flex justify-between items-center space-x-4 px-10 py-6 mt-16 bg-pink ">
                  <div class="flex justify-center items-center gap-x-4" >
                     <i class="fa-solid fa-bell text-orange-300 text-3xl"></i>  
                     <div class="text-white text-lg font-bold"> {{$promotion->title}}</div>
                  </div>
                                  
                  <p id="demo"></p>
</nav>
<div>
   
    <div class=" px-10">
      <div class="mt-24 flex justify-evenly items-start px-24 py-8 shadow-box">
        <div class="">
            <div class="text-4xl font-bold mb-9">Welcome to our promotion</div>
            <div class="w-1/2">{{$promotion->description}}</div>
        </div>
          <div class="">
            <img src="{{ asset('images/promotions/' . $promotion->image_name) }}" alt="Tour Image" class="image-promotion w-96 h-96" >
        </div>
      </div>
    </div>
    
    <div class=" mt-8 flex justify-center gap-10 items-center flex-wrap px-10 py-16 w-full">
        @foreach ($promotion->tours as $tour)
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

    <input type="text">
</div>
      

@endsection


<script>
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
            <div class="countdown-timer">
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
</script>

   
 
