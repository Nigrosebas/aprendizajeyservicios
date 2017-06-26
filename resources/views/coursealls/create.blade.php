@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'coursealls.store']) !!}

        @include('coursealls.fields')

    {!! Form::close() !!}
</div>
@endsection
