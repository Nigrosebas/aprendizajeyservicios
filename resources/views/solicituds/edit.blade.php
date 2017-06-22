@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($solicitud, ['route' => ['solicituds.update', $solicitud->id], 'method' => 'patch']) !!}

        @include('solicituds.fields')

    {!! Form::close() !!}
</div>
@endsection
