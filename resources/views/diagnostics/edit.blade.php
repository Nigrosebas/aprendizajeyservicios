@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($diagnostic, ['route' => ['diagnostics.update', $diagnostic->id], 'method' => 'patch']) !!}

        @include('diagnostics.fields2')

    {!! Form::close() !!}
</div>
@endsection
