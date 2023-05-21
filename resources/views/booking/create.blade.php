@extends('app')
@section('title', 'Home')
@section('content')
    @include('components/navbar')
    <div class="main-content">
        <div class="px-40 section-4 mb-10">
        <h1> {{$user->username}}</h1>

            <div class="place-items-center grid grid-cols-2 p-8">
                <div class="pb-10">
                    <h1 class="text-3xl font-bold text-black">Traveler Detail</h1>
                    <form method="POST" action="{{ route('tour_list.booking.store', ['tour_list' => $tour->id]) }}">
                    @csrf

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                          <input type="hidden" name="tour_id" id="tour_id" value="{{$tour->id}}">

                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black"> </label>
                                <input type="text" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('username', $user->username) }}" required>
                            </div>
                            <div>
                                <label for="phone_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Phone
                                    number</label>
                                <input type="text" id="phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('phone_number', $user->phone_number) }}" required>
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
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Book
                                Now</button>

                        </div>
                    </form>
                </div>

                {{-- div2 --}}
                <div class="pl-24">
                    <h1 class="sm:text-3xl font-bold text-black">Review Order Details</h1>

                    <div
                        class="max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-100 dark:border-gray-300">
                        <a href="#">
                            <img class="rounded-t-lg"
                                src="https://globalcastaway.com/wp-content/uploads/2019/11/the-ultimate-guide-for-visiting-Angkor-Wat.jpg"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">
                                    Angkor Wat Cambodia</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            <a href="detailpage"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('components/footer')
@endsection

