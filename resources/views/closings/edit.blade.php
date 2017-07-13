@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($closing, ['route' => ['closings.update', $closing->id], 'method' => 'patch']) !!}

        @include('closings.fields')

    {!! Form::close() !!}
</div>
@endsection
