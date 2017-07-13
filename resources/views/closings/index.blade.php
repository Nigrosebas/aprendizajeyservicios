@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Closings</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('closings.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($closings->isEmpty())
                <div class="well text-center">No Closings found.</div>
            @else
                @include('closings.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $closings])


    </div>
@endsection
