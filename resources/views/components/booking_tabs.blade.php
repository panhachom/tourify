
<style>
    .text_color {
        background-color : #D5603F;
        color:white;
    }

    .text_color:hover {
        background-color : #ffe6de;
        color: black;
  };

    
</style>

<div class="d-flex mb-5 booking_tabs_shadow py-3">
    <a class="btn text_color  px-4 mx-2" href="{{ route('vendor.booking.index', ['vendor' => 1]) }}">
        <div class="d-flex">
            <i class="bi bi-pencil me-2"></i>            
            <div>All</div>
        </div>       
    </a>
    <a class="btn text_color  px-4 mx-2" href="{{ route('vendor.booking.approved_booking', ['vendor' => 1]) }}">
        <div class="d-flex">
            <i class="bi bi-check-circle me-2"></i>            
            <div>Approved Booking</div>
        </div>       
    </a>

    <a class="btn text_color px-4 mx-2" href="{{ route('vendor.booking.unapproved_booking', ['vendor' => 1]) }}">
        <div class="d-flex">
            <i class="bi bi-clock me-2"></i>            
            <div>Unapproved Booking</div>
        </div>       
    </a>
   
</a>

</div>