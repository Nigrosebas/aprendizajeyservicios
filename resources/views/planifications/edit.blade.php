@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($planification, ['route' => ['planifications.update', $planification->id], 'method' => 'patch']) !!}

        @include('planifications.fields2')

    {!! Form::close() !!}
</div>
@endsection
