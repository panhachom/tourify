<style>
  .card-item{
    width: 330px;
    height: 380px;
    background-color: rgb(255, 252, 252 ,);
    border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    position: relative;
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
  }
  .max-line {
    overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical
  }
</style>
<a href="{{ route('tour_list.show', ['tour_list' => intval($id)]) }}">
  <div class="card-item flex flex-col">
      <div class="location-icon px-5 py-2 flex">
      <i class="fa-solid fa-location-dot me-3 my-1"></i>
    
      <p>{{ $placeName }}</p>
      </div>
      <div class="card-image">
        <img src="{{ asset('images/tours/' . $image) }}" alt="Tour Image">
            </div>
      <div class="card-content">
        <div class="px-3 py-4">
          <h1 class="text-xl font-bold">{{ $name }}</h1>
          <p class="font-extralight text-sm mt-2 max-line">
            {{ $description }}
          </p>
        </div>
      </div>
      <div class="card-button-content bg-slate-100">
        <div class="flex justify-between align-middle px-3 py-3 mt-1 ">
          <div>
          <div class="text-sm font-extralight">Price</div>
          <div>
            <span class="font-bold">{{ $price }}</span>
            <span class="text-sm font-extralight">/ Person</span>
          </div>
          
        </div>
          <button class="bg-primary text-white px-4 py-1"> View Detail</button>
        </div>
      </div>
  </div>

</a>
