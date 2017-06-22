<!-- Id Alumno Field -->

	{!! Form::hidden('id_alumno', Auth::user()->alumno->id, ['class' => 'form-control']) !!}

<!-- Periodo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('periodo', 'Periodo:') !!}
	{!! Form::text('periodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('empresa', 'Empresa:') !!}
	{!! Form::text('empresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pais', 'Pais:') !!}
	{!! Form::text('pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ciudad', 'Ciudad:') !!}
	{!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('cargo', 'Cargo:') !!}
	{!! Form::text('cargo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contactoempresa Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('contactoempresa', 'Contactoempresa:') !!}
	{!! Form::text('contactoempresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlempresa Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('urlempresa', 'Urlempresa:') !!}
	{!! Form::text('urlempresa', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
