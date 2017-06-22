@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'profesors.store']) !!}

        @include('profesors.fields')

    {!! Form::close() !!}
</div>
@endsection
