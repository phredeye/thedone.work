@extends('layouts.app')

@push('assets')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/main.js') }}" defer></script>
@endpush

@section('content')
    <div id="app"></div>
@endsection
