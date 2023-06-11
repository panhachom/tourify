@extends('app')
@section('title', 'Home')
@section('content')


@include('components/navbar')

<div class="main-content">
    <div class="search-content section-1 flex justify-center items-center gap-20">
        <form action="/search" method="GET">
            <div class="child-1">
                <input type="text" name="search" class="rounded-3xl border-2 input-search">
                <button class="btn-search px-7 py-3">Search</button>
            </div>
        </form>
     
        <form method = "GET" class="flex gap-5" action= "/filter">
            <div class="flex flex-col">
                <label for="">Start Date</label>
                <input type="date" id="start-date" name="start_date" class="date-picker border-2" value ="">
            </div>
            <div class="flex flex-col">
                <label for="">End Date</label>
                <input type="date" id="end-date" name="end_date" class="date-picker border-2" value ="">
            </div>
            <button type= "input" class="btn-search px-10 mr-8 py-3 mt-40">Filter</button>
        </form>
        
    </div>
    <!-- <div class = "bg-secondary w-full home-page">
        <div class= "section-1 flex justify-between items-center pt-20 px-16">
            <div class="title-content text-white">
                <div class="title mb-3">
                    <div>Best travel and </div>
                    <div>Destinations</div>
                </div>
                <div class="body ">
                    <div>With travala you can experience new travel and </div>
                    <div>the best tourist destinations that we have to offer</div>
                </div>
                <div class="button-content mt-8 mb-32 ">
                    <button class="px-7 py-3 m-1"> Our Destinations</button>
                    <button  class="px-7 py-3 m-1"> Our Gallery</button>
                </div>
            </div>
            <div class="image-content">
                <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f359881d-6bb2-4391-aba6-779f7084edd4/db9elo8-9897511e-0df5-4bb2-827b-9087bad92d3f.png/v1/fill/w_1024,h_1381,strp/john_wick___transparent_by_asthonx1_db9elo8-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTM4MSIsInBhdGgiOiJcL2ZcL2YzNTk4ODFkLTZiYjItNDM5MS1hYmE2LTc3OWY3MDg0ZWRkNFwvZGI5ZWxvOC05ODk3NTExZS0wZGY1LTRiYjItODI3Yi05MDg3YmFkOTJkM2YucG5nIiwid2lkdGgiOiI8PTEwMjQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.-fffodAIYr-j4Vg2lWjGLYO9DHEQlHpC5xmF8CsXCJE" alt="">
            </div>
        </div>
    </div> -->
    
   <!-- SECTION Slider  -->
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


    <!-- SECTION 3 -->

    <!-- <div class="p-12 section-3">
        <div class="flex justify-center flex-row items-center flex-wrap  px-10 rounded-xl  gap-3">
            <div class="bg-white rounded-2xl  image-container">
            <img class="" src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Horizontal_Logo.png" alt="">
            </div>
            <div class="bg-white rounded-2xl  image-container">   
                <img class="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Musixmatch_horizontal_logo_on_white.svg/1280px-Musixmatch_horizontal_logo_on_white.svg.png" alt="">
            </div>
            <div class="bg-white rounded-2xl  image-container"> 
                <img class="" src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/2560px-Swiggy_logo.svg.png" alt=""> 
            </div>

            <div class="bg-white rounded-2xl  image-container">
                <img class="" src="https://kubernetes.io/images/kubernetes-horizontal-color.png" alt="">
            </div>
            <div class="bg-white rounded-2xl  image-container">
                <img class="" src="https://miro.medium.com/v2/resize:fit:8978/1*s986xIGqhfsN8U--09_AdA.png" alt="">
            </div>
        </div>
    </div> -->

    <!-- SECTION 4 -->

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

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>


    <!-- SECTION 5 -->
    <!-- <div class=" bg-slate-800 text-white flex justify-evenly px-10 py-16">
        <div class=" flex flex-col gap-5 ">
            <div class="text-4xl font-bold">
                We are ready to <br> provide the best<br> trip for you
            </div>
            <div class="font-thin text-md">
                We have a variety of the world's best destinations<br> that you can choose as your trip destination
            </div>
            <div>
                <button class="px-7 py-3 m-1 bg-third rounded-3xl">View More</button>
            </div>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1680352960642-d701eb58323d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80" class=" w-96 rounded-3xl" alt="">
        </div>
    </div> -->
</div>


@include('components/footer')


@endsection