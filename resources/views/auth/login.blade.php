

     @extends('app')
     @section('title', 'Home')
     @section('content')

   <section class="h-screen">
    <div class="container h-full  px-6 py-24  ms-24">

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
        <form method="post" action="{{ route('login.perform') }}">
          <!-- Email input -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           

        @include('layout.partial.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            @if ($errors->has('username'))
                <span class=" text-red-500 text-left"> {{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-red-500 text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button
            type="submit"
            class="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-ripple-color="light">
            Sign in
          </button>


          <!-- Remember me checkbox -->
          <div class="mb-6 flex items-center justify-between mt-5">
            <div>
            <a
              href="{{ url('phoneNumber') }}"
              class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 hover:underline dark:text-primary-500"
              >Sign in with Phone Number</a
            >
            </div>

            <!-- Forgot password link -->
            <!-- <a
              href="{{ url('input') }}"
              class="text-btn2 transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 hover:underline dark:text-primary-500"
              >Forgot password?</a
            > -->
          </div>

        </form>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400 m-6 text-center">
            Don’t have an account yet? <a href="#" class="font-medium text-primary hover:underline dark:text-primary-500">
            <a href="{{ route('register.show') }}"> Sign up here</a>
        </p>
    
        
      </div>
    </div>
  </div>
</section>

