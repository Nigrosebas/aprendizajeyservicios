@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Projects</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('projects.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($projects->isEmpty())
                <div class="well text-center">No Projects found.</div>
            @else
                @include('projects.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $projects])


    </div>
@endsection
