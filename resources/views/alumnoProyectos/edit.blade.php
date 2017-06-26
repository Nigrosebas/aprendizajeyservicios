@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($alumnoproyecto, ['route' => ['alumnoproyectos.update', $alumnoproyecto->id], 'method' => 'patch']) !!}

        @include('alumnoproyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
