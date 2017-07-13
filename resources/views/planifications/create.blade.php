@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'planifications.store']) !!}

        @include('planifications.fields')

    {!! Form::close() !!}
</div>
@endsection
