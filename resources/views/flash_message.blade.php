@if(Session::has('success'))
	<div class="bg-green-200 p-2 text-green-600 mt-4">
		{{ Session::get('success') }}
	</div>
@endif