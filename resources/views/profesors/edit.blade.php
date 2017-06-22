@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($profesor, ['route' => ['profesors.update', $profesor->id], 'method' => 'patch']) !!}

        @include('profesors.fields')

    {!! Form::close() !!}
</div>
@endsection
