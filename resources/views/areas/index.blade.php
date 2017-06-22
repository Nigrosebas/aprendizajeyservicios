@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Areas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('areas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($areas->isEmpty())
                <div class="well text-center">No Areas found.</div>
            @else
                @include('areas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $areas])


    </div>
@endsection
