@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($courseall, ['route' => ['coursealls.update', $courseall->id], 'method' => 'patch']) !!}

        @include('coursealls.fields')

    {!! Form::close() !!}
</div>
@endsection
