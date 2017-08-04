@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Universidades</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('universities.create') !!}">Añadir nueva</a>
        </div>

        <div class="row">
            @if($universities->isEmpty())
                <div class="well text-center">No existen Universidades.</div>
            @else
                @include('universities.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $universities])


    </div>
@endsection
