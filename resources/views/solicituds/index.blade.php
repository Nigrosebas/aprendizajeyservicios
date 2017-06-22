@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            @if($solicituds->isEmpty())
                <div class="well text-center">No Solicituds found.</div>
            @else
                @include('solicituds.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $solicituds])


    </div>
@endsection
