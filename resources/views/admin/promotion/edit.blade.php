@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{$promotion->title}}</h3>
  </div>
  <a href="{{ route('promotion.index') }}" class="btn btn-primary text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form method="POST" action="{{ route('promotion.update', ['promotion' => $promotion->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $promotion->title) }}" required>
            </div>
            @if ($errors->has('title'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('title') }}
                </div>
            @endif
        
            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ old('description', $promotion->description) }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('description') }}
                </div>
            @endif
        
            <div class="form-group col-6 my-2">
                <label for="percent">Discount</label>
                <input type="text" class="form-control" id="percent" name="percent" required value="{{ old('percent', $promotion->percent) }}">
            </div>
            @if ($errors->has('percent'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('percent') }}
                </div>
            @endif

            <div class="form-group col-6 my-2">
                <label for="vendor_id">Vendor</label>
                <select class="form-control select2" name="vendor_id" id="vendor_id" required>
                    <option value=""></option>
                    @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}" {{ old('vendor_id', $promotion->vendor_id) == $vendor->id ? 'selected' : '' }}>{{ old('name', $vendor->name)}}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('vendor_id')) 
                <div class="alert alert-danger">
                    {{ $errors->first('vendor_id') }}
                </div>
            @endif

            <div>
                <label for="image_name">Tour Image</label>
                <input type="file" name="image_name" id="image_name">
                @if ($errors->has('image_name'))
                    <div class="alert alert-danger mx-1">
                        {{ $errors->first('image_name') }}
                    </div>
                @endif
            </div>

            <div class="d-flex mt-2 mb-4 gap-2">
            <div class="form-group w-25">
    <label for="start_date" class="my-1">Start Date</label>
    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $promotion->start_date ? date('Y-m-d', strtotime($promotion->start_date)) : null) }}">
    @if ($errors->has('start_date'))
        <div class="alert alert-danger my-1">
            {{ $errors->first('start_date') }}
        </div>
    @endif
</div>

<div class="form-group w-25">
    <label for="end_date" class="my-1">End Date</label>
    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $promotion->end_date ? date('Y-m-d', strtotime($promotion->end_date)) : null) }}">
    @if ($errors->has('end_date'))
        <div class="alert alert-danger my-1">
            {{ $errors->first('end_date') }}
        </div>
    @endif         
</div>

                
<!-- <div class="col-md-6 mb-3">
    <label class="form-check-label">Status:</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="status" id="statusCheckbox" style="width: 30px; height: 30px;" value="1" {{ old('status', $promotion->status) ? 'checked' : '' }}>
        <label class="form-check-label" for="statusCheckbox">
            <span id="statusText" class="ms-2">{{ old('status', $promotion->status) ? 'Active' : 'Inactive' }}</span>
        </label>
    </div>
</div> -->
            </div>
        </div>

        <div class="col-md-6 offset-md-3 form-group">
    <h6 class="pt-2">Tour:</h6>
    <select class="tags form-control" id="booking_tour_id" name="tours[]" multiple="multiple" required>
        <option value=""></option>
        @foreach($tours as $tour)
            <option value="{{ $tour->id }}" {{ in_array($tour->id, $promotion->tours->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $tour->name }}
            </option>
        @endforeach
    </select>
</div>

        
        <button type="submit" class="btn btn-success text-white mt-4">Update</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const statusCheckbox = document.getElementById('statusCheckbox');
        const statusText = document.getElementById('statusText');

        statusCheckbox.addEventListener('change', function () {
            if (this.checked) {
                statusText.textContent = 'Active';
            } else {
                statusText.textContent = 'Inactive';
            }
        });
    });
</script>

@endsection
