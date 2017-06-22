@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

        @include('projects.fields')

    {!! Form::close() !!}
</div>
@endsection
