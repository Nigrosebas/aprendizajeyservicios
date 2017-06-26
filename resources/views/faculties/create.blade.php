@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'faculties.store']) !!}

        @include('faculties.fields')

    {!! Form::close() !!}
</div>
@endsection
