@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($alumnoProyecto, ['route' => ['alumnoProyectos.update', $alumnoProyecto->id], 'method' => 'patch']) !!}

        @include('alumnoProyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
