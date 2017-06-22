@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'areas.store']) !!}

        @include('areas.fields')

    {!! Form::close() !!}
</div>
@endsection
