<!-- Id Alumno Field -->
	{!! Form::hidden('id_alumno', Auth::user()->alumno->id, ['class' => 'form-control']) !!}

<!-- Periodo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('periodo', 'Periodo:') !!}
	{!! Form::text('periodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nivel', 'Nivel:') !!}
	{!! Form::text('nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Institucion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('institucion', 'Institucion:') !!}
	{!! Form::text('institucion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estado', 'Estado:') !!}
	{!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
