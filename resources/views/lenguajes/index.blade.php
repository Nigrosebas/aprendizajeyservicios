@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Lenguajes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('lenguajes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($lenguajes->isEmpty())
                <div class="well text-center">No Lenguajes found.</div>
            @else
                @include('lenguajes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $lenguajes])


    </div>
@endsection
