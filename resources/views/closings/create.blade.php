@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'closings.store']) !!}

        @include('closings.fields')

    {!! Form::close() !!}
</div>
@endsection
