@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'alumnos.store']) !!}

        @include('alumnos.fields')

    {!! Form::close() !!}
</div>
@endsection
