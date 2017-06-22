@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($course, ['route' => ['courses.update', $course->id], 'method' => 'patch']) !!}

        @include('courses.fields')

    {!! Form::close() !!}
</div>
@endsection
