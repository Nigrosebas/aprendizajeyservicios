@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($alumno, ['route' => ['alumnos.update', $alumno->id], 'method' => 'patch']) !!}

        @include('alumnos.e_fields')

    {!! Form::close() !!}
</div>
@endsection
