@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'backgrounds.store']) !!}

        @include('backgrounds.fields')

    {!! Form::close() !!}
</div>
@endsection
