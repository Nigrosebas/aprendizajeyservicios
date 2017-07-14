@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>EN CONSTRUCCIÓN</h2>
        <p>En desarrollo</p>
        @include('flash::message')
        <div class="table-responsive"> 
            <table class="table" border="1">
            <tr>
                <td>
                    {!! Form::label('project_name', 'Nombre del Proyecto:') !!}
                    {!! $project->project_name!!}
                </td>
                <td>
                    {!! Form::label('year', 'Año:') !!}
                    <p>{!! $project->year !!}</p>
                </td>
                <td>
                    {!! Form::label('course', 'Curso:') !!}</br>
                    @foreach($cursos as $c)
                        @if ($c->id == $project->id_course)
                            {!! $c->name_course!!}
                        @endif
                    @endforeach
                    
                </td>
            </tr>
            </table>
        </div>
    </div>
@endsection                                                                                      
<div class="form-group col-sm-4">