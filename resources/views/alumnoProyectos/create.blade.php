@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'alumnoProyectos.store']) !!}

        @include('alumnoProyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
