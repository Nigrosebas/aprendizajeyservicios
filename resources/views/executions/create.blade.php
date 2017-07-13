@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'executions.store']) !!}

        @include('executions.fields')

    {!! Form::close() !!}
</div>
@endsection
