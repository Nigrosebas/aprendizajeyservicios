@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'formacionacademicas.store']) !!}

        @include('formacionacademicas.fields')

    {!! Form::close() !!}
</div>
@endsection
