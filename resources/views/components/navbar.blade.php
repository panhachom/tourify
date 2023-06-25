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
						
						</button>
						<div class="hidden  " id="dropdown">
							<ul class="py-1 w-72 mt-7 bg-white text-black" aria-labelledby="dropdown">
								<li>hello</li>
								<li>hello</li>
								<li>hello</li>
								<li>hello</li>
							</ul>
						</div>
					</div>
			</li>
			
			<li><a href="{{ route('logout.perform') }}" class="">Logout</a></li>
			<li>
				<div class="max-w-lg mx-auto">
					<div class="flex flex-row">
						<button class="" type="button" data-dropdown-toggle="dropdown-2"> 
							<i class="fa fa-globe  text-xl" aria-hidden="true"></i>
						</button>					
						<div class="hidden  " id="dropdown-2">
							<ul class="py-1 w-72 mt-4 bg-white text-black" aria-labelledby="dropdown-2">
							@forelse (auth()->user()->notifications as $n)
							<li class=' w-72 overflow-hidden text-sm'> {{ $n->type }}</li>
							@empty
							<li> Empty</li>
							@endforelse
							</ul>
						</div>
					</div>
			</li>
			@endauth

			@guest
			<li><a href="{{ route('login.perform') }} " class=" w">Login</a></li>
			<li><a href="{{ route('register.perform') }}">Register</a></li>
			@endguest
		</div>
	</ul>
</nav>