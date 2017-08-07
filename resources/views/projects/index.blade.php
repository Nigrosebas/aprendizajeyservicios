@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Proyectos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('projects.create') !!}">Añadir Nuevo</a>
        </div>

        <div class="row">
            @if($projects->isEmpty())
                <div class="well text-center">No hay Proyectos.</div>
            @else
                @include('projects.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $projects])


    </div>
@endsection
