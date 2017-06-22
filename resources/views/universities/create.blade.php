@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'universities.store']) !!}

        @include('universities.fields')

    {!! Form::close() !!}
</div>
@endsection
