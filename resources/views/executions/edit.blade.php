@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($execution, ['route' => ['executions.update', $execution->id], 'method' => 'patch']) !!}

        @include('executions.fields')

    {!! Form::close() !!}
</div>
@endsection
