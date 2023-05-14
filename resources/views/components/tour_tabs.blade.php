<div class="d-flex mb-5">
    <a class="btn btn-secondary px-4 mx-2" href="{{ route('vendor.tours.edit', ['vendor' => 1, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-pencil me-2"></i>            
            <div>Details</div>
        </div>       
    </a>
    <a class="btn btn-secondary px-4 mx-2" href="{{ route('vendor.tours.images.index', ['vendor' => 1, 'tour' => $tour->id]) }}">
        <div class="d-flex">
            <i class="bi bi-card-image me-2"> </i>
            <div>Image</div>
        </div>       
    </a>

    <a class="btn btn-secondary px-4 mx-2" href="{{ route('vendor.tours.activity.index', ['vendor' => 1, 'tour' => $tour->id]) }}">
        <div class="d-flex">
        <i class="bi bi-journals me-2"></i> </i>
            <div>Activity</div>
        </div>       
    </a>

    <a class="btn btn-secondary px-4 mx-2" href="{{ route('vendor.tours.country.index', ['vendor' => 1, 'tour' => $tour->id]) }}">
        <div class="d-flex">
        <i class="bi bi-journals me-2"></i> </i>
            <div>Country</div>
        </div>       
    </a>

    
</a>


</div>