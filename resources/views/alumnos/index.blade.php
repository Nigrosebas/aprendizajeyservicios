@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Alumnos</h1>

            <!--<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('alumnos.create') !!}">Add New</a>-->
        </div>

        <div class="row">
            @if($alumnos->isEmpty())
                <div class="well text-center">No existen Alumnos aún.</div>
            @else
                @include('alumnos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $alumnos])


    </div>
@endsection
