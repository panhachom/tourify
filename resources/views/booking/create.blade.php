@extends('app')
@section('title', 'Home')
@section('content')
    @include('components/navbar')
    <div class="main-content">
        <div class="px-40 section-4 mb-10">

            <div class="place-items-center grid grid-cols-2 p-8">
                <div class="pb-10">
                    <h1 class="text-3xl font-bold text-black">Traveler Detail</h1>
                    <form method="POST" action="{{ route('tour_list.booking.store', ['tour_list' => $tour->id]) }}">
                    @csrf

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                          <input type="hidden" name="tour_id" id="tour_id" value="{{$tour->id}}">

                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm font-medium mt-5 text-gray-900 dark:text-black"> Username </label>
                                <input type="text" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('username', $user->username) }}" required>

                                    <label for="phone_number"
                                    class="block mb-2 text-sm mt-5 font-medium text-gray-900 dark:text-black">Phone
                                    number</label>
                                <input type="text" id="phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('phone_number', $user->phone_number) }}" required>
                            </div>
                            <div>
                           
                            </div>
                            <label for="qunatity">Select Number of People</label>
                            <select name="quantity">
                                @for ($i = 1; $i <= $tour->qty; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                

                        </div>
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email
                                address</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-red text-white">Book
                                Now</button>
                        </div>
                    </form>

                @if(session('error'))
                <div class=" bg-red-200 p-2 text-red-600 mt-4">
                    {{ session('error') }}
                </div>
                @endif

                @if(Session::has('success'))
                <div class="bg-green-200 p-2 text-green-600 mt-4">
                    {{ Session::get('success') }}
                </div>
                @endif


                </div>

               
                {{-- div2 --}}
                <div class="pl-24">
                    <h1 class="sm:text-3xl font-bold text-black mb-5">Review Order Details</h1>
                    <x-card-component
                        placeName="{{ $tour->vendor->name }}"
                        name="{{ $tour->name }}"
                        description="{{ $tour->description }}"
                        price="{{ $tour->price }}"
                        image="{{ $tour->tour_images->isNotEmpty() ? $tour->tour_images->first()->name : null }}"
                        id="{{ $tour->id }}"
                    />
                 
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('components/footer')
@endsection

