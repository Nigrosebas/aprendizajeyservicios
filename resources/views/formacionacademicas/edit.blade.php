@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($formacionacademica, ['route' => ['formacionacademicas.update', $formacionacademica->id], 'method' => 'patch']) !!}

        @include('formacionacademicas.fields')

    {!! Form::close() !!}
</div>
@endsection
