@vite('resources/css/app.css')


<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Reset your account's Password
                </h1>
                <form class="space-y-4 md:space-y-6 justify-center items-center" action="{{url('forgot-password')}}" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2">Input New Password:</label>
                        <input type="email" name="email" id="email" class=" ml-2.5 w-3/4 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@email.com">


                    <button type="submit" class="p-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 p-5">
                         <a href="/" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Back</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>