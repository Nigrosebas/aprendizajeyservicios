@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($faculty, ['route' => ['faculties.update', $faculty->id], 'method' => 'patch']) !!}

        @include('faculties.fields')

    {!! Form::close() !!}
</div>
@endsection
