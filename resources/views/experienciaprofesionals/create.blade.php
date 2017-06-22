@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'experienciaprofesionals.store']) !!}

        @include('experienciaprofesionals.fields')

    {!! Form::close() !!}
</div>
@endsection
