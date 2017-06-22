@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($certificado, ['route' => ['certificados.update', $certificado->id], 'method' => 'patch']) !!}

        @include('certificados.fields')

    {!! Form::close() !!}
</div>
@endsection
