@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'solicituds.store']) !!}

        @include('solicituds.fields')

    {!! Form::close() !!}
</div>
@endsection
