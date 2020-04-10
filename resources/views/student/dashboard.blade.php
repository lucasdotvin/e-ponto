@extends('layouts.content-with-navbar')

@section('title', 'Dashboard')

@endsection

@section('main-content')
    @component('components.student-workload-data')
        @slot('totalWorkload', $workloadData['totalWorkload'])
        @slot('completeWorkload', $workloadData['completeWorkload'])
    @endcomponent
@endsection
