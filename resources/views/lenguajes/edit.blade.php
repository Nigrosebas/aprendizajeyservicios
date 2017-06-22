@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($lenguaje, ['route' => ['lenguajes.update', $lenguaje->id], 'method' => 'patch']) !!}

        @include('lenguajes.fields')

    {!! Form::close() !!}
</div>
@endsection
