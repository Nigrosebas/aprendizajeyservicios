@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Idiomas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('idiomas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($idiomas->isEmpty())
                <div class="well text-center">No existen Idiomas aún.</div>
            @else
                @include('idiomas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $idiomas])


    </div>
@endsection
