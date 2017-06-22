@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($experienciaprofesional, ['route' => ['experienciaprofesionals.update', $experienciaprofesional->id], 'method' => 'patch']) !!}

        @include('experienciaprofesionals.fields')

    {!! Form::close() !!}
</div>
@endsection
