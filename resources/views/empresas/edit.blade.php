@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'patch']) !!}

        @include('empresas.e_fields')

    {!! Form::close() !!}
</div>
@endsection
