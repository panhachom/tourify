@extends('vendor/show')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>{{ $activity->name}}</h3>
  </div>
  <a href="{{ route('vendor.activity.index', ['vendor' => $vendor_id]) }}" class="btn btn-success text-white">Back</a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="border p-5 table_style radius">
    <form action="{{ route('vendor.activity.update', ['vendor' => $vendor_id, 'activity' => $activity->id]) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="form-group col-12 my-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('name', $activity->name) }}"  name="name" required>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('name') }}
                </div>
            @endif

            <div class="form-group col-12 my-2">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ old('description', $activity->description) }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger my-1">
                    {{ $errors->first('description') }}
                </div>
            @endif


        </div>
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-success text-white mt-4" onclick="return confirm('Are you sure you want to update this Activity?')">
        Update
    </button>
</form>
    </form>
</div>

@endsection
