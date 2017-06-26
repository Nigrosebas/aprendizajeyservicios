@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">AlumnoProyectos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('alumnoproyectos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($alumnoproyectos->isEmpty())
                <div class="well text-center">No AlumnoProyectos found.</div>
            @else
                @include('alumnoproyectos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $alumnoproyectos])


    </div>
@endsection
