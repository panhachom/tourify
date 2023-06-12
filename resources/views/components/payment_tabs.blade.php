
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
    <a class="btn text_color  px-4 mx-2" href="{{ route('vendor.payment.show', ['vendor' => $vendor_id , 'payment' => $booking->payment_id ]) }}">
        <div class="d-flex gap-2">
            <i class="bi bi-envelope-paper "></i>            
            <div> Reciept</div>
        </div>                                                   
    </a>
</a>

</div>