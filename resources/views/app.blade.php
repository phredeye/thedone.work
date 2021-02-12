@extends('layouts.app')

@push('assets')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/app/main.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('assets/app/main.js') }}" defer></script>
@endpush

@section('content')
    <div id="app"></div>
@endsection
