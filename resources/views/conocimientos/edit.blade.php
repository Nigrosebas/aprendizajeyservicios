@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($conocimientos, ['route' => ['conocimientos.update', $conocimientos->id], 'method' => 'patch']) !!}

        @include('conocimientos.fields')

    {!! Form::close() !!}
</div>
@endsection
