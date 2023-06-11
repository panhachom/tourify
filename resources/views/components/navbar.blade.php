<nav class="px-5 py-3 bg-primary   text-white">
	<div class="flex justify-between  items-center md:px-10 px-2">
		<div class="navbar-section-1"> <a href="/">
				<div class="flex items-center gap-2">
					<div class="logo w-12 h-12 rounded-full flex justify-center items-center">
						<div class="font-bold text-white "><img src="{{ asset('images/logo.png') }}" alt="" class="rounded-full"></div>
					</div>
					<div>
						<div class="font-bold tracking-wide	 text-lg">Tourify</div>
					</div>

				</div>
			</a>
		</div>
		<div class="navbar-section-2 toggle-menu gap-10 flex justify-center items-center" id="center-menu">
			<div class=""><a href="{{ route('home.index') }}">Home</a></div>
			<div class=""><a href="{{ route('about.index') }}">About Us</a></div>
			<div class=""><a href="{{ route('tour_list.index') }}">Tours</a></div>
			<div class=" sign-in "><a href="#">Login</a></div>
			<div class=" sign-in "><a href="#">Register</a></div>
		</div>

		<div class="navbar-section-3">
			@auth
			<div class="flex gap-5">
				<div class="max-w-lg mx-auto">
   					 <button type="button" data-dropdown-toggle="dropdown">{{auth()->user()->username}}</button>
				<div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
				
					<ul class="py-1" aria-labelledby="dropdown">
					<li>
						<a href="{{ route('profile') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
					</li>
					<li>
						<a href="{{ route('wishlist') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Wishlist</a>
					</li>
					<li>
						<a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a>
					</li>
					<li>
						<a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
					</li>
					</ul>
				</div>

			</div>



				<a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
			</div>
			@endauth

			@guest
			<a class="mx-2" href="{{ route('login.perform') }}">Login</a>
			<a class="mx-2" href="{{ route('register.perform') }}">Register</a>
			@endguest

		</div>
		<div class="navbar-section-4">
			<i class="fa-solid fa-bars" id="hamberger-btn"></i>
		</div>
	</div>
</nav>


<script>
	const hambergerBtn = document.getElementById("hamberger-btn");
	const centerMenu = document.querySelector("#center-menu");

	hambergerBtn.addEventListener("click", function() {
		centerMenu.classList.toggle("toggle-menu");
	});
</script>