    <!-- component -->
    @extends('app')
     @section('title', 'Home')
     @section('content')


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>

       
        @media (min-width: 768px) {
        .user {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .edit {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .md\:p-8 {
            padding: 2rem;
        }

        .pb-8 {
            padding-bottom: 2rem;
        }

        .md\:pb-0 {
            padding-bottom: 0;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-5 {
            margin-top: 1.25rem;
        }
        }

        @media (min-width: 1024px) {
        .lg\:px-20 {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        .mt-6 {
            margin-top: 2rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mt-5 {
            margin-top: 1.75rem;
        }
        }

    </style>
   
 @include('components/navbar')
<div class="my-50">
    <!-- End of Navbar -->
    <div class="container mx-auto my-20 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class=" user bg-white p-3 border-t-4 border-primary">
                    <div class="image overflow-hidden m-9 items-center">
                       <svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#ed6f07" stroke="#ed6f07"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M256,508C117.04,508,4,394.96,4,256S117.04,4,256,4s252,113.04,252,252S394.96,508,256,508z"></path> <path style="fill:#D6D6D6;" d="M256,8c136.752,0,248,111.248,248,248S392.752,504,256,504S8,392.752,8,256S119.248,8,256,8 M256,0 C114.608,0,0,114.608,0,256s114.608,256,256,256s256-114.608,256-256S397.392,0,256,0L256,0z"></path> <g> <ellipse style="fill:#e0720b;" cx="256" cy="175.648" rx="61.712" ry="60.48"></ellipse> <path style="fill:#e0720b;" d="M362.592,360.624c0-57.696-47.728-104.464-106.592-104.464s-106.592,46.768-106.592,104.464H362.592 z"></path> </g> </g></svg>
                    </div>
                     {{-- <form action="/upload" method="POST" enctype="multipate/form-data">
                        @csrf
                        <div class="m-2">
                            <input type="file" name="photos">
                        </div>
                        <div>
                            <button type="submit" class="bg-primary py-1 px-2 rounded hover:bg-primary text-white text-sm mx-24">Upload</button>
                        </div>
                     </form> --}}
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">{{$user->username}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6"></h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"></p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            {{-- <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-primary py-1 px-2 rounded text-white text-sm">Active</span></span> --}}
                        </li>
                        <li class="flex items-center py-3">
                            {{-- <span>Member since</span>
                            <span class="ml-auto">Nov 07, 2016</span> --}}
                        </li>
                         
                    </ul>
                    
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">User Name</div>
                                <div class="px-4 py-2">{{$user ->username}}</div>
                            </div>
                            
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Phone Number</div>
                                <div class="px-4 py-2">{{$user ->phone_number}}</div>
                            
                            </div>
                            <div class="grid grid-cols-2">
                                <div class=" list-disc px-4 py-2 font-semibold ">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">{{$user ->email}}</a>
                                </div>
                            </div>
                            {{-- <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Password</div>
                                <div class="px-4 py-2">{{$user ->password}}</div>
                            </div> --}}
                        </div>
                    </div>
                   
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Edit Password -->
                <div class=" edit bg-white p-3 shadow-sm rounded-sm w-full md:w-11/12 ">

                    <div class="grid grid-cols-2  ">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="26" height="26"
                                        viewBox="0 0 26 26">
                                        <path d="M 20.09375 0.25 C 19.5 0.246094 18.917969 0.457031 18.46875 0.90625 L 17.46875 1.9375 L 24.0625 8.5625 L 25.0625 7.53125 C 25.964844 6.628906 25.972656 5.164063 25.0625 4.25 L 21.75 0.9375 C 21.292969 0.480469 20.6875 0.253906 20.09375 0.25 Z M 16.34375 2.84375 L 14.78125 4.34375 L 21.65625 11.21875 L 23.25 9.75 Z M 13.78125 5.4375 L 2.96875 16.15625 C 2.71875 16.285156 2.539063 16.511719 2.46875 16.78125 L 0.15625 24.625 C 0.0507813 24.96875 0.144531 25.347656 0.398438 25.601563 C 0.652344 25.855469 1.03125 25.949219 1.375 25.84375 L 9.21875 23.53125 C 9.582031 23.476563 9.882813 23.222656 10 22.875 L 20.65625 12.3125 L 19.1875 10.84375 L 8.25 21.8125 L 3.84375 23.09375 L 2.90625 22.15625 L 4.25 17.5625 L 15.09375 6.75 Z M 16.15625 7.84375 L 5.1875 18.84375 L 6.78125 19.1875 L 7 20.65625 L 18 9.6875 Z"></path>
                                    </svg>
                                </span>
                                <span class="tracking-wide">Edit Password</span>
                            </div>
                            <ul class="list-inside space-y-2 ">
                                 <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                                    <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                        Change Password
                                    </h2>
                                    <form action="{{ route('update-password') }}"class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="#" method="POST">
                                    @csrf
                                     @if (session('success'))
                                    <div class=" text-green-600" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @elseif (session('error'))
                                    <div class=" text-red-600" role="alert">
                                         {{ session('error') }}
                                    </div>
                                    @endif
                                    
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current password</label>
                                        <input type="password" name="password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                         <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                                         <input type="new_password" name="new_password" id="new_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        @error('new_password')
                                         <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                    <div>
                                        <label for="new_password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="new_password_confirmation" name="new_password_confirmation" id="new_password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                     </div>
                                     <div class="flex items-start">
                                   
                                     </div>
                                     
                                    <button type="submit" class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save password</button>
                                   
                                </form>
                                </div>
                            </ul>
                        </div>
                        <div>
                        </div>
                    </div>
                    <!-- End of Edit Password -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</div>
<div class="mt-96">
@include('components/footer')
</div>



<!-- component --> 