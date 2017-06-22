@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Formacion Académica</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('formacionacademicas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($formacionacademicas->isEmpty())
                <div class="well text-center">No existen Formaciones Académicas aún.</div>
            @else
                @include('formacionacademicas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $formacionacademicas])


    </div>
@endsection
