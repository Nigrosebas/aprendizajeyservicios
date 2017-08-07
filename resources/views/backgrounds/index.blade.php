@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Backgrounds</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('backgrounds.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($backgrounds->isEmpty())
                <div class="well text-center">No existen Backgrounds.</div>
            @else
                @include('backgrounds.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $backgrounds])


    </div>
@endsection
