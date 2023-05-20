@extends('admin_main')
@section('title', 'Home')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <h3>{{ $promotion->title}}</h3>
    <a href="{{ route('admins.promotion.index') }}" class="btn btn-success text-white">Back</a>
</div>

<div class="border p-5 rounded">
    <form action="{{ route('vendor.activity.update', ['vendor' => 1, 'activity' => $activity->id]) }}" method="POST">
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
        <form action="{{ route('vendor.activity.update', ['vendor' => $vendor->id, 'activity' => $activity->id]) }}" method="POST" class="d-inline">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-success text-white mt-4" onclick="return confirm('Are you sure you want to update this Activity?')">
        Update
    </button>
</form>
    </form>
</div>

@endif
@endsection
    

