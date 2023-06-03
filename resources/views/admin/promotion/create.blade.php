@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Create Promotion</h3>
  </div>
  <a href="{{ route('promotion.index') }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form method="POST" action="{{ route('promotion.store') }}" enctype= "multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            @if ($errors->has('title'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('title') }}
                </div>
            @endif
        
            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ old('description') }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('description') }}
                </div>
            @endif
        
            <div class="form-group col-6 my-2 ">
                <label for="percent">Discount</label>
                <input type="text" class="form-control" id="percent" name="percent" required value="{{ old('percent') }}">
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
            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
        @endforeach
    </select>
</div>

            @if ($errors->has('price')) 
                <div class="alert alert-danger">
                    {{ $errors->first('price') }}
                </div>
            @endif

            <div>
        <label for="image_name"> Tour Image </label>
        <input type="file" name="image_name" id="image_name">
        @if ($errors->has('image_name'))
                <div class="alert alert-danger mx-1">
                    {{ $errors->first('image_name') }}
                </div>
        @endif

        <div class="d-flex mt-2 mb-4 gap-2">
            <div class="form-group w-25">
                <label for="start_date" class="my-1">Start Date</label>
                <input type="date" name="start_date" class="form-control">
                @if ($errors->has('start_date'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('start_date') }}
                </div>
                @endif
            </div>

            <div class="form-group w-25">
                <label for="end_date" class="my-1">End Date</label>
                <input type="date" name="end_date" class="form-control">
                @if ($errors->has('end_date'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('end_date') }}
                </div>
                @endif         
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-check-label">Status:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="statusCheckbox" style="width: 30px; height: 30px;">
                    <label class="form-check-label" for="statusCheckbox">
                        <span id="statusText" class="ms-2">Inactive</span>
                    </label>
                </div>
            </div>
            
        </div>
        </div>

       <div class="col-md-6 offset-md-3 form-group">
            <h6 class="pt-2">Tour: </h6>
            <select class="tags form-control" id="booking_tour_id" name="tours[]" multiple="multiple" required>
            <option value=""></option>
                    @foreach($tours as $tour)
                        <option value="{{$tour->id}}">{{$tour->name}}</option>
                    @endforeach
                </select>
            </select>
       </div>
</div>

        </div>

        <button type="submit" class="btn btn-success text-white mt-4">Create</button>
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