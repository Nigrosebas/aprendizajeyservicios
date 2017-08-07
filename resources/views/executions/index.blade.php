@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Ejecución</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('executions.create') !!}">Añadir nueva Ejecución</a>
        </div>

        <div class="row">
            @if($executions->isEmpty())
                <div class="well text-center">No existen Ejecuciones.</div>
            @else
                @include('executions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $executions])


    </div>
@endsection
