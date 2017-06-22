@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($idioma, ['route' => ['idiomas.update', $idioma->id], 'method' => 'patch']) !!}

        @include('idiomas.fields')

    {!! Form::close() !!}
</div>
@endsection
