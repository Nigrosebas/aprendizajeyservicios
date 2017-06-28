@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'motivations.store']) !!}

        @include('motivations.fields')

    {!! Form::close() !!}
</div>
@endsection
