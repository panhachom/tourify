<nav class="navbar">
    <div class="logo flex justify-center items-center gap-x-4">
		<img src="{{ asset('images/logo.png') }}"  width="60" alt="" class="rounded-full">
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
				<button class="" type="button" data-dropdown-toggle="dropdown">{{auth()->user()->username}}</button>

				<div class="hidden bg-primary text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
					<ul class="py-1" aria-labelledby="dropdown">
						<li><a href="#" class="text-md text-black  px-4 py-2">Dashboard</a> </li>
						<li><a href="#" class="text-md  px-4 py-2">Dashboard</a> </li>
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

  