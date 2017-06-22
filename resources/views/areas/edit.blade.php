@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($area, ['route' => ['areas.update', $area->id], 'method' => 'patch']) !!}

        @include('areas.fields')

    {!! Form::close() !!}
</div>
@endsection
