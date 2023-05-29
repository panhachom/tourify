<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        .input-field {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            color: #2d3748;
            font-size: 0.875rem;
            border-radius: 0.375rem;
            padding: 0.625rem;
            width: 100%;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

        .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-align: center;
        background-color: red;
        color: white;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        }

        .notification {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        }

        .error {
        background-color: #fed7d7;
        color: #c53030;
        }

        .success {
        background-color: #c6f6d5;
        color: #38a169;
        }

        @media (min-width: 768px) {
        .main-content {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .grid-cols-2 {
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
</head>
<body>
    
@extends('app')
@section('title', 'Home')
@section('content')
    @include('components/navbar')

    <div class="main-content">
  <div class="px-4 md:px-10 lg:px-20 section-4 mb-10">
    <div class="place-items-center grid grid-cols-1 md:grid-cols-2 gap-8 p-4 md:p-8">
      <div class="md:pb-0">
        <h1 class="pb-12 text-3xl font-bold text-black">Traveler Detail</h1>
        <form method="POST" action="{{ route('tour_list.booking.store', ['tour_list' => $tour->id]) }}">

          @csrf

          <input type="hidden" name="tour_id" id="tour_id" value="{{$tour->id}}">
          <div class="grid gap-6 mt-6 md:grid-cols-2">
            <div>
              <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Username</label>
              <input type="text" id="username" class="input-field" value="{{ old('username', $user->username) }}" required>
            </div>
            <div>
              <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Phone number</label>
              <input type="text" id="phone_number" class="input-field" value="{{ old('phone_number', $user->phone_number) }}" required>
            </div>

            <div class="col-span-2">
              <label for="quantity">Select Number of People</label>
              <select name="quantity" class="input-field">
                @for ($i = 1; $i <= $tour->qty; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>

            <div class="col-span-2">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email address</label>
              <input type="email" id="email" class="input-field" value="{{ old('email', $user->email) }}" required>
            </div>
          </div>

          <div class="mt-6">
            <button type="submit" class="button">Book Now</button>
          </div>

        </form>

        @if(session('error'))
        <div class="notification error mt-4">
          {{ session('error') }}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="notification success mt-4">
          {{ Session::get('success') }}
        </div>
        @endif

      </div>
      
      <div>
        <h1 class="text-3xl font-bold text-black mb-5">Review Order Details</h1>
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

    @include('components/footer')
@endsection

</body>
</html>
