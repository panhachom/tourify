
    @extends('app')
    @section('title', 'Home')
    @section('content')
    @include('components/navbar')
  
	<style>
	.h{
		height:100%;
	}
	</style>
    <div class="bg-white p-8 rounded-md w-full px-28 ">
	<div class=" flex items-center justify-between pb-6 h-full">
		<div>
			<h2 class="text-gray-600 font-semibold">Tours Order History</h2>
			<span class="text-xs"> <span class=" font-medium">Customer:</span> {{ $user->email }}</span>
		</div>
		<div class="flex items-center justify-between">
			<!-- <div class="flex bg-gray-50 items-center p-2 rounded-md">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
						clip-rule="evenodd" />
				</svg>
				<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
          </div> -->
				<div class="lg:ml-40 ml-10 space-x-8">
					<a href="{{ route('tour_list.index') }}">
						<button class="bg-primary px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">More Tours</button>
					</a>
				</div>
			</div>
		</div>
		<div>
		@if($bookings->isEmpty())
			<p class="text-center my-12">No order yet</p>
		@else

			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto h-96">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Name
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Vendor
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Created at
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Quantity
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Total
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Status
								</th>
							</tr>
						</thead>
						<tbody>
						
								@foreach($bookings as $booking)
								<tr>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<a href="{{ route('tour_list.show', ['tour_list' => intval($booking->tour->id)]) }}">
											<div class="flex justify-start items-center">
												@if($booking->tour->tour_images->isEmpty())
												<img src="https://thumbs.dreamstime.com/b/illustration-placeholder-icon-white-background-107735899.jpg" width="50" height="50" alt="">
												@else
												<img src="{{ asset('images/tours/' . $booking->tour->tour_images->first()->name) }}" class=" w-24" alt="Tour Image" >    
												@endif
												<div class="ml-3">
													<p class="text-gray-900 whitespace-no-wrap">
														{{ $booking->tour->name}}
													</p>
												</div>
											</div>
										</a>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">{{ $booking->tour->vendor->name }}</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">
										{{ $booking->created_at->format('Y d M')}}

										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ">
										<p class="text-gray-900 whitespace-no-wrap">
										{{ $booking->quantity}}
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ">
										<p class="text-gray-900 whitespace-no-wrap">
										 $ {{ $booking->total}}
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<span
											class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
											<span aria-hidden
												class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
										<span class="relative">Paid</span>
										</span>
									</td>
								</tr>
								@endforeach						
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		@endif

	</div>

    @endsection

