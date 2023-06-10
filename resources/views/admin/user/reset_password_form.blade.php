@extends('admin_main')
@section('title', 'Home')
@section('content')


<section class="">
    <div>

        <div>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h3 class="text-xl mb-3">
                    Reset your account's Password
                </h3>
                <form class="space-y-4 md:space-y-6 justify-center items-center" action="{{url('forgot-password')}}" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white w-1/2">Input New Password:</label>
                        <input type="email" name="email" id="email"  placeholder="example@email.com">
                    <button type="submit" class="btn btn-primary">Reset</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 p-5">
                         <a href="/" class="btn btn-primary">Back</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection