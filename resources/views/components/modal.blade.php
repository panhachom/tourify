<style>
    .modal-contanier {
       background-color:red;
    }

    .overlay {
        position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background color */
      backdrop-filter: blur(5px);
      z-index: 10000;
    }

    .close {
        top: 10px;
        right: 10px;
    }

</style>

<?php
    $booking = App\Models\Booking::latest()->first();
?>

@if($booking)

<div class='modal-contanier overlay flex justify-center items-center '>
    <div class="p-5 border w-1/3 h-1/2 shadow-lg rounded-md bg-white" >
      <div class="flex justify-center mt-6 ">
        <div class="flex justify-center flex-col items-center gap-y-4 ">
            <div class=" text-2xl text-green-600 font-medium">Payment Successful</div>
            <img src="{{ asset('check.png') }}" width="60" alt="My Image">
        </div>
      </div>
      <div class="flex mt-4 flex-col gap-y-2 text-sm">
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Payment method</div>
            <div>Paypal</div>
         </div>
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Quantity</div>
            <div>{{ $booking->quantity }}</div>
         </div>
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Tour</div>
            <div>{{ $booking->tour->name }}</div>
         </div>
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Email</div>
            <div>{{ $booking->payment->payer_email }}</div>
         </div>
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Paid Amount</div>
            <div class=" text-green-600 font-bold">$ {{ $booking->payment->amount }}</div>
         </div>
         <div class="flex justify-between items-center w-full px-4">
            <div class="text-gray-500">Transaction Id</div>
            <div class=" font-bold">{{ $booking->payment->payer_id }}</div>
         </div>
      </div>
      <div class="flex justify-center items-center gap-6 mt-10">
        <a href="{{ route('home.index') }}" class=" rounded-full bg-green-50 hover:bg-green-100 p-4"><i class="fa-solid fa-download text-green-600 text-lg"></i> </a>
        <a href="{{ route('home.index') }}" class=" rounded-full bg-orange-50 hover:bg-orange-100 p-4"><i class="fa-solid fa-house text-primary text-lg"></i></a>

    </div>
    </div>
</div>
@endif