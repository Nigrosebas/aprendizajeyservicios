@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Coursealls</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('coursealls.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($coursealls->isEmpty())
                <div class="well text-center">No Coursealls found.</div>
            @else
                @include('coursealls.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $coursealls])


    </div>
@endsection
