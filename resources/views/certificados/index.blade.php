@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Certificados</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('certificados.create') !!}">Añadir</a>
        </div>

        <div class="row">
            @if($certificados->isEmpty())
                <div class="well text-center">No existen Certificados aún.</div>
            @else
                @include('certificados.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $certificados])


    </div>
@endsection
