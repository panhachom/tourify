
@extends('app')
@section('title', 'Booking')
@section('content')

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
       

        .modal {
      display: none; /* Hide the modal by default */
      /* ... */
    }
</style>
  <div class="section-4  ">
    <div class="place-items-center grid grid-cols-1 md:grid-cols-2 gap-8 p-4 md:p-8">
      <div class="md:pb-0">
        <h1 class="pb-12 text-3xl font-bold text-black">Traveler Detail</h1>
        <form method="POST" action="{{ route('pay', ['tour_list' => $tour->id]) }}">

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

            <div class="d-fex">
            <div class="col-span-2">
              <label for="quantity">Select Number of People</label>
              <select name="quantity" id='quantity' class="input-field">
                @for ($i = 1; $i <= $tour->qty; $i++)
                <option id=""value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
            </div>

            <div class="mt-1">
              <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Total ($)</label>
              <input type="text" class="input-field" id="total-price" value="{{ $tour->discount_price ?? $tour->price }}" readonly name="amount">
            </div>

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
          discount="{{ $tour->discount_price }}"

        />
      </div>
    </div>
  </div>

  <div id="myModal" class="modal">
    <div class="modal-content">
      @include('components/modal')
    </div>
  </div>
  
  <?php 
    use App\Models\Promotion;
    $promotions = $promotions = Promotion::where('status', true)->get();

?>
    
    @if ($promotions === null || $promotions->isEmpty())
     <div></div>
    @else



        <p id="demo"></p>
        <script>
            var promotions = @json($promotions);
            var hasExpiredPromotion = false;

            promotions.forEach(function($promotion) {
                var startDateTime = "{{ $promotion->start_date }}"; 
            var endDateTime = "{{ $promotion->end_date }}";
            var countDownDate = new Date(endDateTime).getTime();

            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
            
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Add leading zeros to the values
                days = days.toString().padStart(2, '0');
                hours = hours.toString().padStart(2, '0');
                minutes = minutes.toString().padStart(2, '0');
                seconds = seconds.toString().padStart(2, '0');

                document.getElementById("demo").innerHTML = `
                <div class="flex font-size invisible ">
                ${days}${hours}${minutes}${seconds}
                </div>
                `;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    window.location.reload();
                    location.replace('/');
                    
                }
            }, 1000);

        });
        </script>
    @endif




<script>
        // Get the necessary elements
        var quantityInput = document.getElementById('quantity');
        var totalPriceInput = document.getElementById('total-price');
        var tourPrice = parseFloat({{ $tour->discount_price ??  $tour->price  }}); 
        
        quantityInput.addEventListener('change', function() {
            var quantity = parseInt(quantityInput.value);
            var totalAmount = tourPrice * quantity;
            totalPriceInput.value = totalAmount.toFixed(2);
        });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var modal = document.getElementById('myModal');
      var closeBtn = document.getElementById('modalCloseBtn');
      var bookingSuccess = '<?php echo session('booking_success'); ?>';

      // If booking success, show the modal
      if (bookingSuccess) {
        modal.style.display = 'block';
      }

      // Close the modal when the close button is clicked
      closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
      });
    });
  </script>

@endsection

</body>
</html>

