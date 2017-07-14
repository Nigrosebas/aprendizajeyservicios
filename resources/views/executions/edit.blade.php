@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($execution, ['route' => ['executions.update', $execution->id], 'method' => 'patch']) !!}

        @include('executions.fields2')

    {!! Form::close() !!}
</div>
@endsection
