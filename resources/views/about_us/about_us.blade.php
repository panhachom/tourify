
@extends('app')
@section('title', 'About us')
@section('content')


<style>
    .about-us {
        width: 600px;
    }
    .des {
        width: 30rem;
    }
</style>
<div class="w-full bg-cover bg-center" style="height:32rem; background-image: url(https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);">
    <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
        <div class="text-center">
            <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">Explore More <span class="underline text-blue-400"></span></h1>
            <button class="mt-4 px-4 py-2 bg-primary text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-50">Tourify</button>
        </div>
    </div>
</div>
</header>
<section class=" text-gray-700 body-font bg-white mt-16">
  <div class="flex flex-col justify-evenly items-center lg:flex-row p-12">
    <div class="des px-12">
        <h1 class="title-font sm:text-5xl text-3xl mb-4 font-bold text-gray-900 tracking-normal 2xl:whitespace-normal whitespace-nowrap">
            OUR VISION
        </h1>
        <p class="mt-5 mb-8 leading-relaxed text-lg 2xl:whitespace-normal">
            <span class="text-yellow-600 font-bold text-xl">
                Tourify
            </span>
            is a centralized web app that allows tour companies to showcase their tour schedules, including the duration, price, and location. Users can browse all the tours offered by different tour companies on a single platform and view details about each tour. They can also search for tours that match their interests by filtering the results based on location, price range, activity level, and more.
        </p>
    </div>

    <img class="object-cover object-center rounded about-us" alt="tip_book" src="https://static.euronews.com/articles/stories/07/40/04/18/1000x563_cmsv2_18031e1e-5231-5c9c-b555-bd4896b64b04-7400418.jpg">


   
</div>
</section>

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Meet Our Team</h2>
        <p class="font-light text-gray-500 lg:mb-16 text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
    </div> 


    <div class="flex gap-4 flex-col lg:flex-row justify-center items-center">
        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/Panha.jpg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Chom Panha</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
        


        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/mu.jpg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Mak Rathmuny</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
    </div>

    <div class="flex gap-4 flex-col lg:flex-row justify-center items-center mt-6">
        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/setha.jpg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Meanith Setha</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>

        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/imagess.jpeg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hak Mengkhun</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
    </div>

    <div class="flex gap-4 flex-col lg:flex-row  items-start mt-6 ml-0 md:ml-7">
        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/p.jpg') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ren Sonita</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
    </div>
  


            
  </div>
</section>


