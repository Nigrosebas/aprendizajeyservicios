@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'alumnoproyectos.store']) !!}

        @include('alumnoproyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
