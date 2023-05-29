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
			<!-- <div class='max-w-md mx-auto'>
				<div class="relative flex items-center w-full h-9 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
					<div class="grid place-items-center h-full w-12 text-gray-300">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
						</svg>
					</div>

					<input
					class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
					type="text"
					id="search"
					placeholder="Search something.." /> 
				</div>
			</div> -->
			<div class=" sign-in "><a href="#">Login</a></div>
			<div class=" sign-in "><a href="#">Register</a></div>
		</div>




		<div class="navbar-section-3">
			@auth
			<div class="flex gap-5">
				<p>{{auth()->user()->username}}</p>
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