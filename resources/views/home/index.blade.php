@extends('app')
@section('title', 'Home')
@section('content')


@include('shares/navbar')

<div class="p-3">
    @include('shares/card')
</div>

@include('shares/footer')


@endsection