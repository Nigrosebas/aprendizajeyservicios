@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'lenguajes.store']) !!}

        @include('lenguajes.fields')

    {!! Form::close() !!}
</div>
@endsection
