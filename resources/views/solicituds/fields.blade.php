<!-- Nombre Empresa Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_empresa', 'Nombre Empresa:') !!}
	{!! Form::text('nombre_empresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Clasificacion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('clasificacion', 'Clasificacion:') !!}
	{!! Form::text('clasificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
	{!! Form::text('ubicacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Prioridad Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('prioridad', 'Prioridad:') !!}
    {!! Form::select('prioridad',['Baja' => 'Baja', 'Media' => 'Media', 'Alta' => 'Alta'], null,['class' => 'form-control']) !!}
</div>

<!-- Rut Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_encargado', 'Rut Encargado:') !!}
	{!! Form::text('rut_encargado', null, ['class' => 'form-control','disabled'=>'true']) !!}
    {!! Form::hidden('rut_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('area', 'Area:') !!}
	{!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nivel', 'Nivel:') !!}
    {!! Form::select('nivel',['Iniciado' => 'Iniciado', 'Avanzado' => 'Avanzado','Practicante' => 'Practicante', 'Tesista' => 'Tesista'], null,['class' => 'form-control']) !!}
</div>

<!-- Duracion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('duracion', 'Duracion:') !!}
    {!! Form::select('duracion',['1 Semestre' => '1 Semestre', '2 Semestres' => '2 Semestres','1 Año' => '1 Año' ], null,['class' => 'form-control']) !!}
</div>


<!-- Requerido Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('requerido', 'Requerido:') !!}
	{!! Form::textarea('requerido', null, ['class' => 'form-control' , 'placeholder' => 'Acá se especifica lo que se busca realizar durante el tiempo establecido ya sean Funciones y/o Requisitos minimos. Ejemplo:
-Conocimiento medio de lenguajes C , Java.
-Desarrollo de un sistema de gestión de bases de datos para la gestión.']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
