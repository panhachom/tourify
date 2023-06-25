@extends('admin_main')
@section('title', 'Promotion')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
<div class="d-flex justify-content-between align-items-center mb-5 w-full  px-4 py-3 vendor-title">
  <div class="d-flex justify-content-center align-items-center">
    <i class="bi bi-back h4 me-3 vendor-icon "></i>
    <h3>Promotion</h3>
  </div>
  <a href=" {{ route('promotion.create') }}" class="btn btn-success text-white">Create New Promotion</a>
</div>

@if ($promotions->isEmpty())
    <p>No Promotion. Please add one.</p>
@else
  <table class="table mt-5 table-borderless table-hover table_style">
    <thead class="thead-light header_color text-black">
      <tr >
          <th>No</th>
          <th>Title</th>
          <th>Description</th>
          <th class="text-center">Vendor</th>
          <th class="text-center">Activate</th>
          <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($promotions as $index => $promotion_item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $promotion_item->title }}</td>
                      <td >{{ Str::limit($promotion_item->description, 50, '...') }}</td>
                      <td class="text-center text-info fw-bold">{{ $promotion_item->vendor->name}} </td>
                      <td class="text-center">
                      <form action="{{ route('promotion.toggleActivation', ['id' => $promotion_item->id]) }}" method="POST">
                              @method('PUT')
                              @csrf
                              <button type="submit" class="btn text-white {{  $promotion_item->status ? 'btn-success' : 'btn-warning' }}">
                                  {{ $promotion_item->status ? 'Activated' : 'Activate' }}
                              </button>                      
                      </form>

                    </td>
                      <td class="text-center">
                          <a href=" {{route( 'promotion.edit',['promotion' => $promotion_item->id])}}" class="btn btn-sm btn-light"><i class="bi bi-pencil text-primary font-weight-bold p-3"> Edit</i></a>
                          <form action="{{route( 'promotion.destroy',['promotion' => $promotion_item->id])}}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are you sure you want to delete this Activity?')">
                                  <i class="bi bi-trash text-danger"> Delete</i>
                                  </button>
                          </form>
                      </td>
                  </tr>

        @endforeach
    </tbody>
  </table>

@endif

@if (session('success'))
<div id="success-alert" class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

<script>
    // Hide the success message after 3 seconds
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000);
</script>

<style>
    #success-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 300px;
    }
</style>

@endsection
