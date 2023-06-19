<style>
  .card-item{
    width: 330px;
    height: 380px;
    background-color: rgb(255, 252, 252 ,);
    border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    position: relative;
    transition-duration: 0.5s;

  }

  .card-item .location-icon {
    position: absolute;
    margin-top: 8px;
    right: 0;
    margin-right: 10px;
    font-size: 14px;
    background-color: rgba(109, 109, 109, 0.5);
    color: white;
    border-radius: 18px;

  }
  .card-item:hover {
    transform: translateY(-10px);

}
  .card-image img{
    border-radius: 15px 15px 0 0px;
    height: 205px;
    width: 100%;
  }
  .card-button-content{
    height: 100%;
  }
  .card-button-content button {
    font-size: 13px;
    border-radius: 18px;
    height: 35px;
    color:red; 
    background-color: transparent;
  }
  .max-line {
    overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical
  }
  .max-line-2 {
    overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical
  }
</style>
<a href="{{ route('tour_list.show', ['tour_list' => intval($id)]) }}">
  <div class="card-item flex flex-col">
      <div class="location-icon px-5 py-2 flex">
        <i class="fa-solid fa-location-dot me-3 my-1 text-sm"></i>
        <p>{{ $placeName }}</p>
      </div>
      <div>
      </div>
      <div class="card-image">
        <img src="{{ asset('images/tours/' . $image) }}" alt="Tour Image">
            </div>
      <div class="card-content">
        <div class="px-3 py-4">
          <h1 class=" text-lg font-bold max-line-2">{{ $name }}</h1>
          <p class="font-extralight text-xs mt-1 max-line">
            {{ $description }}
          </p>
        </div>
      </div>
      <div class="card-button-content bg-slate-100">
        <div class="flex justify-between align-middle px-3 py-3 mt-1 ">
          <div>
          <div class="text-sm font-extralight">Price</div>
          @if($discount != '')
          <div> 
            <span class="font-bold text-xl text-red-700	"> $ {{ $discount }}</span>
            <span class="font-bold text-sm line-through	"> $ {{ $price }}</span>
            <span class="text-sm font-extralight">/ Person</span>
          </div>
          @else
          <div>
            <span class="font-bold"> $ {{ $price }}</span>
            <span class="text-sm font-extralight">/ Person</span>
          </div>
          @endif
          
        </div>
        <form action="{{ route('favorite.add', intval($id)) }}" method="POST" enctype="multipart/form-data">
             @csrf
          <button class="">
              <div class="flex gap-2 justify-center items-center py-2 px-2">
                <img src="https://cdn-icons-png.flaticon.com/128/7245/7245139.png" width="35" alt="">
                <div class=' text-gray-500'> Add to Favorite</div>
              </div>
          </button>
      </form>
      </div>

      </div>
  </div>

</a>
