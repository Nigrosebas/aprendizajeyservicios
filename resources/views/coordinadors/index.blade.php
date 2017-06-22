@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Coordinadors</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('coordinadors.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($coordinadors->isEmpty())
                <div class="well text-center">No Coordinadors found.</div>
            @else
                @include('coordinadors.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $coordinadors])


    </div>
@endsection
