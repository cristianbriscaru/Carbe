@extends('layouts.master')
@section('title')
Search Cars to Buy
@endsection
@section('content')
<nav aria-label="breadcrumb" >
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buy</li>
        </ol>
</nav>
    <div class="container mb-5">
        <h2 class="text-info text-center mb-5"> Search New & Used Cars to Buy</h2>
        <search v-bind:poptions="true"></search>

    </div>
@endsection
@push('scripts')
    <script>
        window.old=@json(  count(old()) || $searchQuery == null ? old() : $searchQuery );
        window.errors=@json($errors->toArray());
        window.makes=@json($makes);
        
    </script>
@endpush