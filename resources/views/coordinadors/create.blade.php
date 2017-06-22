@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'coordinadors.store']) !!}

        @include('coordinadors.fields')

    {!! Form::close() !!}
</div>
@endsection
