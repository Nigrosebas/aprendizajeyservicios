<link href="!! asset('package/multi-select.css')!!}" media="screen" rel="stylesheet" type="text/css">
<!-- Id Profesor Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_profesor', 'Profesor:') !!}
	{!! Form::text('id_profesor', Auth::user()->profesor->nombre, ['class' => 'form-control','disabled' => 'disabled']) !!}
    {!! Form::hidden('id_profesor', Auth::user()->profesor->id, ['class' => 'form-control']) !!}
</div>

<!-- Id University Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_university', 'Id University:') !!}
	{!! Form::text('id_university', Auth::user()->profesor->universidad->nombre_u, ['class' => 'form-control','disabled' => 'disabled']) !!}
     {!! Form::hidden('id_university', Auth::user()->profesor->universidad->id, ['class' => 'form-control']) !!}
</div>

<!-- Year Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('year', 'Year:') !!}
	{!! Form::text('year', date('Y'), ['class' => 'form-control','disabled' => 'disabled']) !!}
    {!! Form::hidden('year',  date('Y'), ['class' => 'form-control']) !!}

</div>

<!-- Id Course Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_course', 'Curso:') !!}
	{!! Form::select('id_course', $cursos,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group ">
    <div class="col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading form-group">
                <h1 class="panel-title" align="center">Proyecto de A+S</h1>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Nombre del Proyecto</div>
                    <div class="panel-body">{!! Form::text('project_name', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Ramo en el que se impartirá el Proyecto</div>
                    <div class="panel-body">{!! Form::text('ramo', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">¿Cuál es el nivel de complejidad del Proyecto ?</div>
                            <div class="panel-body">
                                <div class="form-group col-sm-6 col-lg-4">
                                {!! Form::select('complejidad',['Baja' => 'Baja', 'Media' => 'Media', 'Alta' => 'Alta'], null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">¿Cuál será la duración del Proyecto?</div>
                            <div class="panel-body">
                                <div class="form-group col-sm-6 col-lg-4">
                                {!! Form::select('duracion',['1 Semestre' => '1 Semestre', '2 Semestres' => '2 Semestres'], null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">¿Cómo documentarán los participantes sus actividades de servicio?</div>
                    <div class="panel-body">{!! Form::text('project_documentaran', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">¿Cómo se evaluará a los estudiantes?</div>
                    <div class="panel-body" align="center">
                    <link href="{!! asset('package/multi-select.css')!!}" media="screen" rel="stylesheet" type="text/css">
                    <link href="{!! asset('package/multi-select.dev.css')!!}" media="screen" rel="stylesheet" type="text/css">
                     {!! Form::select('evaluaciones[]',['Presentación' => 'Presentación', 'Autoevaluación' => 'Autoevaluación','Diagnostico' => 'Diagnostico'], null,['class' => 'form-control','multiple'=>'multiple','id'=>'custom-headers']) !!}

                    <script src="{!! asset('package/jquery.multi-select.js')!!}" type="text/javascript"></script>
                    <script type="text/javascript">
                    $('#custom-headers').multiSelect({
                      selectableHeader: "<div class='custom-header'>Seleccionables</div>",
                      selectionHeader: "<div class='custom-header'>Seleccionados</div>"
                    });
                    </script>
                    <br></br>
                    {!! Form::text('otras_evaluaciones', null, ['class' => 'form-control','placeholder'=>'Otro tipo de evaluación']) !!}
                    </div>    
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">¿Cree usted estar preparado para llevar a cabo un A+S?</div>
                    <div class="panel-body">{!! Form::radio('project_sabe', '1',['class' => 'form-control','value'=>'1'])!!} SI <br>
                    {!! Form::radio('project_sabe', '0',['class' => 'form-control','value'=>'0'])!!} NO
                    </div>
                    <div class="panel-footer">Si su respuesta es NO, una vez creado el proyecto encontrará el manual.</div>
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>