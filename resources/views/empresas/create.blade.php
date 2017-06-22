@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'empresas.store']) !!}

        @include('empresas.fields')

    {!! Form::close() !!}
</div>
@endsection
