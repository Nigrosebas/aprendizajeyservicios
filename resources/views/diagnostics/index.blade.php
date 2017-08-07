@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Diagnosticos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('diagnostics.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($diagnostics->isEmpty())
                <div class="well text-center">No existen Diagnosticos.</div>
            @else
                @include('diagnostics.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $diagnostics])


    </div>
@endsection
