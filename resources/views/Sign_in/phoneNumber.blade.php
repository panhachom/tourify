<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @extends('app')
     @section('title', 'Home')
     @section('content')
</head>
<body>
    
   <section class="h-screen">
    <div class="container h-full  px-6 py-24 m-24">
     
    <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between w-full rounded-b-lg ">
      <!-- Left column container with background-->
      <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12 bg-primary w-full h-full ">
        <img
          src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="w-full h-full "
          alt="Phone image" />
      </div>
       
      <!-- Right column container with form -->
      <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
        <h1 class="mb-12 mt-1 pb-1 text-xl font-semibold text-center">
        Sign In here
        </h1>
        <form>
          <!-- Email input -->
          <div class="relative mb-6" data-te-input-wrapper-init>
            <div>
            <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PhoneNumber</label>
            <input type="phoneNumber" id="phoneNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
           </div>
          </div>

          <!-- Password input -->
          <div class="relative mb-6" data-te-input-wrapper-init>
            <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
           </div>
                          
          </div>

          <!-- Remember me checkbox -->
          <div class="mb-6 flex items-center justify-between">
            <div>
            <a
              href="{{ url('email') }}"
              class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 hover:underline dark:text-primary-500"
              >Sign in with email</a
            >
            </div>

            <!-- Forgot password link -->
            <a
              href="{{ url('input') }}"
              class="text-btn2 transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 hover:underline dark:text-primary-500"
              >Forgot password?</a
            >
          </div>

          <!-- Submit button -->
          <button
            type="submit"
            class="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-ripple-color="light">
            Sign in
          </button>
          

          <!-- Divider -->

          <!-- Social login buttons -->
         
        </form>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400 m-6 text-center">
            Don’t have an account yet? <a href="#" class="font-medium text-primary hover:underline dark:text-primary-500">Sign up here</a>
        </p>
      </div>
    </div>
  </div>
</section>

</body>
</html>
