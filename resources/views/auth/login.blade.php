@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
    @include('common.errors')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div align="center" class="panel-heading">Inicio de Sesion</div>
                    <div class="panel-body">
                    
                    {!! Form::open(['class'=>'form-horizontal' ,'route' => 'auth.login', 'method' => 'POST'] )!!}
                        {!! csrf_field() !!}

                        <div class="form-group col-md-8">
                            {!! Form::label ('usuario','Usuario')!!}
                            {!! Form::text('usuario',null,['class' => 'form-control', 'placeholder' => 'Usuario'])!!}
                        </div>

                        <div class="form-group col-md-8">
                            {!! Form::label ('password','Password')!!}
                            {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*******'])!!}
                        </div>

                        <div class="form-group col-md-8">
                            {!! Form::submit('Acceder',['class'=> 'btn btn-primary'])!!}
                        </div>
                    {!! Form::close()   !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .input-group-addon {
        color: #fff;
        background: #3276B1;
        margin-bottom: 2px;
    }
</style>
@endsection