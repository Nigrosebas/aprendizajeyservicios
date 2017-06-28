@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($motivation, ['route' => ['motivations.update', $motivation->id], 'method' => 'patch']) !!}

        @include('motivations.fields')

    {!! Form::close() !!}
</div>
@endsection
