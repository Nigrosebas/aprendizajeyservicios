@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Proyectos Terminados</h1>
        </div>

        <div class="row">
            @if($projects->isEmpty())
                <div class="well text-center">No hay Proyectos.</div>
            @else
                @include('projects.table2')
            @endif
        </div>

        @include('common.paginate', ['records' => $projects])


    </div>
@endsection