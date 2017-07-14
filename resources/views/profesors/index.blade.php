@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Profesores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('profesors.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($profesors->isEmpty())
                <div class="well text-center">No hay Profesores.</div>
            @else
                @include('profesors.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $profesors])


    </div>
@endsection
