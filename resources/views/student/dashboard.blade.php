@extends('layouts.content-with-navbar')

@section('title', 'Dashboard')

@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('student.punch-in-logs.index') }}">
        <span class="icon">
            <i class="fas fa-clock"></i>
        </span>

        <span>
            Ponto Eletrônico
        </span>
    </a>
@endsection

@section('main-content')
    @component('components.student-workload-data')
        @slot('totalWorkload', $workloadData['totalWorkload'])
        @slot('completeWorkload', $workloadData['completeWorkload'])
    @endcomponent
@endsection
