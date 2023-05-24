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
    <a class="btn text_color  px-4 mx-2" href="{{ route('vendor.tours.edit', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-pencil me-2"></i>            
            <div>Details</div>
        </div>       
    </a>
    <a class="btn text_color px-4 mx-2" href="{{ route('vendor.tours.images.index', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-card-image me-2"> </i>
            <div>Image</div>
        </div>       
    </a>

    <a class="btn text_color px-4 mx-2" href="{{ route('vendor.tours.activity.index', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}">
        <div class="d-flex">
        <i class="bi bi-journals me-2"></i> </i>
            <div>Activity</div>
        </div>       
    </a>

    <a class="btn text_color px-4 mx-2" href="{{ route('vendor.tours.country.index', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-globe-americas me-2"></i>            
        <div>Country</div>
        </div>       
    </a>

    <a class="btn text_color px-4 mx-2" href="{{ route('vendor.tours.tour_date.index', ['vendor' => $vendor_id, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-calendar2-event me-2"></i>            
        <div>Select Date</div>
        </div>       
    </a>

    
</a>


</div>