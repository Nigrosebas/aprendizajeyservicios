@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'courses.store']) !!}

        @include('courses.fields')

    {!! Form::close() !!}
</div>
@endsection
