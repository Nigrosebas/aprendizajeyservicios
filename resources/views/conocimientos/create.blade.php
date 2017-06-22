@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'conocimientos.store']) !!}

        @include('conocimientos.fields')

    {!! Form::close() !!}
</div>
@endsection
