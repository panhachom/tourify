<nav class="navbar">
	<div class="logo flex justify-center items-center gap-x-4">
		<img src="{{ asset('images/logo.png') }}" width="60" alt="" class="rounded-full">
		<div class="font-bold tracking-wide	 text-lg">Tourify</div>

	</div>
	<ul class="nav-links">
		<input type="checkbox" id="checkbox_toggle" />
		<label for="checkbox_toggle" class="hamburger">&#9776;</label>
		<div class="menu">
			<li><a href="{{ route('home.index') }}">Home</a></li>
			<li><a href="{{ route('about.index') }}">About Us</a></li>
			<li><a href="{{ route('tour_list.index') }}">Tours</a></li>

			@auth
			<li>
				<div class="max-w-lg mx-auto">
					<div class="flex flex-row">
						<button class="" type="button" data-dropdown-toggle="dropdown">{{auth()->user()->username}}
							<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
								<style>
									svg {
										fill: #ff8040
									}
								</style>
								<path d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
							</svg>
						</button>
						<div class="hidden  " id="dropdown">
							<ul class="py-1" aria-labelledby="dropdown">
								<li>
									<div id="toast-notification" class="w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-300" role="alert">
										<div class="flex items-center mb-3">
											<span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Available Promotion</span>
											<!-- <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
												<span class="sr-only">Close</span>
												<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
												</svg>
											</button> -->
										</div>
										<div class="flex items-start flex-col w-80">
											
											@foreach($notifications as $notification_data)
											<div class="flex flex-row ">
												<a href="{{ route('customer_promotion.show', ['promotion' => intval($promotion->id)]) }}" class="flex flex-row" >
											<div class="relative inline-block shrink-0">
												<img class="w-12 h-12 rounded-full" src="/images/promotions/{{$notification_data->image_name}}" alt="Null" />
												<span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
													<svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path>
													</svg>
													<span class="sr-only">Message icon</span>
													
												</span>
											</div>
											<div class="ml-3 text-sm font-normal">
												<div class="text-sm font-semibold text-gray-900 dark:text-white">{{$notification_data->title}}</div>
												<div class="text-sm font-normal">{{$notification_data->description}}</div>
												<span class="text-xs font-medium text-blue-600 dark:text-blue-500">{{$notification_data ->created_at->diffForHumans()}}</span>
												
											</div>
											
											</div>
											<div class="w-3/4 my-3 h-1 rounded-lg z-10 overflow-hidden bg-gray-100">

											</div>
											</a>
											@endforeach
										</div>
										
										
									</div>
									

								</li>
							</ul>
						</div>
					</div>
			</li>
			<li><a href="{{ route('logout.perform') }}" class="">Logout</a></li>
			@endauth

			@guest
			<li><a href="{{ route('login.perform') }}">Login</a></li>
			<li><a href="{{ route('register.perform') }}">Register</a></li>
			@endguest
		</div>
	</ul>
</nav>