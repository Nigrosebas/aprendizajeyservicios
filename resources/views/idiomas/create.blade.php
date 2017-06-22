@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'idiomas.store']) !!}

        @include('idiomas.fields')

    {!! Form::close() !!}
</div>
@endsection
