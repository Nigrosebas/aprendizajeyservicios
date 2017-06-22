@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Courses</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('courses.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($courses->isEmpty())
                <div class="well text-center">No Courses found.</div>
            @else
                @include('courses.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $courses])


    </div>
@endsection
