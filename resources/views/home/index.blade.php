@extends('app')
@section('title', 'Home')
@section('content')




<div class="">
   <div class="slider-section mt-16">
    <div class="main-slider">
        <div class="slider">
        <div class="slides">
            <!--radio buttons start-->
            @foreach($promotions as $index => $promotion)
                <input type="radio" name="radio-btn" id="radio{{ $index + 1 }}">
            @endforeach

            @foreach($promotions as $index => $promotion)
                <div class="slide{{ $index === 0 ? ' first' : '' }}">
                    <a href="{{ route('customer_promotion.show', ['promotion' => intval($promotion->id)]) }}">
                        <img src="{{ asset('images/promotions/' . $promotion->image_name) }}" alt="Tour Image">
                    </a>
                </div>
            @endforeach
            <div class="navigation-auto">
                @foreach($promotions as $index => $promotion)
                    <div class="auto-btn{{ $index + 1 }}"></div>
                @endforeach
            </div>
        </div>
      
        </div>
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

 
      
   </div>


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
                <x-tour-button-link icon="fa-regular fa-building" tourType="City Tours"  color='primary'  />
                <x-tour-button-link icon="fa-regular fa-building" tourType="Adventure Tours"  color='btn2'  />        
            </div>
            <div class="flex gap-2">
                <x-tour-button-link icon="fa-regular fa-building" tourType="Cultural Tours"  color='btn3'  />
                <x-tour-button-link icon="fa-regular fa-building" tourType="City Tour"  color='btn4'  />
            </div>
        </div>
      
        
    </div>

    <div class="px-40 mt-20 section-4 mb-10">
        <div class="flex justify-between items-center mb-16 ">
            <div class="text-3xl font-bold">Recently add</div>
            <div class=" text-sm font-thin">Some of the most popular destinations for<br> you visit with a view the beautiful one.</div>
            <button class="px-7 py-3 m-1">View More</button>
        </div>

        <div class="flex justify-center items-center flex-wrap gap-10">
        @foreach($tours as $tour)

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
    <div class="px-40 mt-20 section-4 mb-10">
        <div class="flex justify-between items-center mb-16 ">
            <div class="text-3xl font-bold">Recommedation</div>
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


