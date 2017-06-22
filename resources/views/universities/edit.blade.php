@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($university, ['route' => ['universities.update', $university->id], 'method' => 'patch']) !!}

        @include('universities.fields')

    {!! Form::close() !!}
</div>
@endsection
