<style>
  .card-item{
    width: 330px;
    height: 380px;
    background-color: rgb(255, 252, 252 ,);
    border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    position: relative;
    transition: 0.5s;
  }
  .card-item:hover {
    transform: scale(1.02); 
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
</style>

<div class="card-item flex flex-col">
		<div class="location-icon px-5 py-2 flex">
		<i class="fa-solid fa-location-dot me-3 my-1"></i>
   
		<p>{{ $placename }}</p>
		</div>
		<div class="card-image">
			<img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
		</div>
		<div class="card-content">
			<div class="px-3 py-4">
				<h1 class="text-xl font-bold">{{ $name }}</h1>
				<p class="font-extralight text-sm mt-2 text-ellipsis">
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
				<button class="bg-primary text-black px-4 py-1"> View Detail</button>
			</div>
		</div>
</div>
