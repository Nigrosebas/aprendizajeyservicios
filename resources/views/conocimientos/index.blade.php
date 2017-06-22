@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Conocimientos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('conocimientos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($conocimientos->isEmpty())
                <div class="well text-center">No existen Conocimientos aún.</div>
            @else
                @include('conocimientos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $conocimientos])


    </div>
@endsection
