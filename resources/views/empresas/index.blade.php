@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Empresas</h1>
            <!--
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('empresas.create') !!}">Add New</a>-->
        </div>

        <div class="row">
            @if($empresas->isEmpty())
                <div class="well text-center">No existen Empresas aún.</div>
            @else
                @include('empresas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $empresas])


    </div>
@endsection
