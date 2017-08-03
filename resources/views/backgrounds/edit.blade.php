@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($background, ['route' => ['backgrounds.update', $background->id], 'method' => 'patch']) !!}

        @include('backgrounds.fields')

    {!! Form::close() !!}
</div>
@endsection
