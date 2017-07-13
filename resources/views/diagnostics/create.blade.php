@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'diagnostics.store']) !!}

        @include('diagnostics.fields')

    {!! Form::close() !!}
</div>
@endsection
