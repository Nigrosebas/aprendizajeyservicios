@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="table-responsive"> 
            <table class="table table-striped table-bordered table-hover table-condensed">
            <div class="row">
                <tr>
                    <td>
                        {!! Form::label('project_name', 'Nombre del Proyecto:') !!}
                        <p>{!! $project->project_name!!}</p>
                    </td>
                    <td>
                        {!! Form::label('year', 'Año:') !!}
                        <p>{!! $project->year !!}</p>
                    </td>
                    <td>
                        {!! Form::label('course', 'Carrera:') !!}
                        <p>
                        @foreach($cursos as $c)
                            @if ($c->id == $project->id_course)
                                {!! $c->name_course!!}
                            @endif
                        @endforeach
                        </p>
                        
                    </td>
                </tr>
                <tr>
                    <td>{!! Form::label('Profesor a Cargo:') !!}
                    <p>{!! $profesors->nombre !!}</p>
                    </td>
                    <td>{!! Form::label('Universidad:') !!}
                     <p>{!! $universidad->nombre_u!!}</p>
                    </td>
                    <td>{!! Form::label('Ramo/Curso:') !!}
                    <p>{!! $project->ramo !!}</p>
                    </td>
                </tr>
            </div>
            <div>
                <tr>
                    <td COLSPAN=3>{!! Form::label('Participantes:') !!}
                        <p>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Rut</td>
                            <td>Rol</td>
                        </tr>
                        </thead>
                        @foreach($alumnos as $al)
                        <tr>
                            <td>{!! $al -> nombre!!}</td>
                            <td>{!! $al -> rut!!}</td>
                            <td>{!! $al -> rol!!}</td>
                        </tr>
                        @endforeach
                        </table>
                        </p>

                    </td>
                </tr>
            </div>
            <div class="row">
                <tr>
                    <td COLSPAN=3>
                        {!! Form::label('Resumen:') !!}
                         <p>{!! $project->resumen !!}</p>
                    </td>
                </tr>
                <tr>
                    <td COLSPAN=3>
                        {!! Form::label('Objetivos Alcanzados:') !!}
                         <p>{!! $project->objetivos !!}</p>
                    </td>
                </tr>
                <tr>
                    <td COLSPAN=3>
                        {!! Form::label('Resultados:') !!}
                         <p>{!! $project->resultados !!}</p>
                    </td>
                </tr>
                <tr>
                    <td COLSPAN=3>
                        {!! Form::label('Conclusión:') !!}
                         <p>{!! $project->conclusion !!}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::label('Porcentaje Terminado :') !!}
                    <p>{!! $project->porcentaje !!}</p>
                    </td>
                </tr>
            </div>
            </table>
        </div>
    </div>
@endsection                                                                                      