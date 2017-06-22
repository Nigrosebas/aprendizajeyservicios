@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">AlumnoProyectos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('alumnoProyectos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($alumnoProyectos->isEmpty())
                <div class="well text-center">No AlumnoProyectos found.</div>
            @else
                @include('alumnoProyectos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $alumnoProyectos])


    </div>
@endsection
