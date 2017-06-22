@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($coordinador, ['route' => ['coordinadors.update', $coordinador->id], 'method' => 'patch']) !!}

        @include('coordinadors.fields')

    {!! Form::close() !!}
</div>
@endsection
