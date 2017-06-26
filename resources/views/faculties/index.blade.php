@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Faculties</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('faculties.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($faculties->isEmpty())
                <div class="well text-center">No Faculties found.</div>
            @else
                @include('faculties.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $faculties])


    </div>
@endsection
