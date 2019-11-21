@extends('layouts.content-with-navbar')

@section('title', 'Dashboard')

@php
    $userRoleSlug = Auth::user()->role->slug;
    $userRoleDashboard = "roles.{$userRoleSlug}.dashboard";
@endphp

@include($userRoleDashboard)

@push('scripts')
    <!-- <Font Awesome> -->
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
