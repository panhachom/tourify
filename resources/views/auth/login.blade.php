

     @extends('app')
     @section('title', 'Sign in')
     @section('content')
  
     <style>
        .background-login {
            position: relative;
          }
          
        .background-login::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-image: url('https://plus.unsplash.com/premium_photo-1661904509551-6570836702e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8amFpcHVyJTIwY2l0eXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80');
          background-size: cover;
          background-position: center;
          opacity: 0.5; /* Adjust the opacity value for desired lightness */
        }
        
        b.ackground-login .content {
          position: relative;
          z-index: 1;
        }
     </style>
   
   <section class="h-screen flex justify-center items-center background-login">
  
    <div class="w-96 shadow-md p-5 content bg-slate-100 rounded-lg">
            <h1 class="text-center my-6 text-xl font-bold">Sign in Here</h1>
            <form method="post" action="{{ route('login.perform') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
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

        </form>

        <p class="text-sm font-light text-gray-500 dark:text-gray-400 m-6 text-center">
            Don’t have an account yet? <a href="#" class="font-medium text-primary hover:underline dark:text-primary-500">
            <a href="{{ route('register.show') }}"> Sign up here</a>
        </p>
  </div>
  
 
</section>

@endsection










      