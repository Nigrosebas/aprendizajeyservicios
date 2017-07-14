@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Planificaciones</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('planifications.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($planifications->isEmpty())
                <div class="well text-center">No Planifications found.</div>
            @else
                @include('planifications.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $planifications])


    </div>
@endsection
