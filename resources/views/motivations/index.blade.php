@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Motivaciones</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('motivations.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($motivations->isEmpty())
                <div class="well text-center">No se encontraron Motivaciones.</div>
            @else
                @include('motivations.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $motivations])


    </div>
@endsection
