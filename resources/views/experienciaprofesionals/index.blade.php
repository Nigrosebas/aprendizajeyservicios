@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Experiencia Profesional</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('experienciaprofesionals.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($experienciaprofesionals->isEmpty())
                <div class="well text-center">No existen Experiencias Profesionales aún.</div>
            @else
                @include('experienciaprofesionals.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $experienciaprofesionals])


    </div>
@endsection
