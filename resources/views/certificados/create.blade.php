@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'certificados.store']) !!}

        @include('certificados.fields')

    {!! Form::close() !!}
</div>
@endsection
