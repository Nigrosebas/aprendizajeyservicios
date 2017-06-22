@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'projects.store']) !!}

        @include('projects.fields')

    {!! Form::close() !!}
</div>
@endsection
