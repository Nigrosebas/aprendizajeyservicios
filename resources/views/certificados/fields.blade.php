<!-- Id Alumno Field -->
	{!! Form::hidden('id_alumno', Auth::user()->alumno->id, ['class' => 'form-control']) !!}


<!-- Certificadora Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('certificadora', 'Certificadora:') !!}
	{!! Form::text('certificadora', null, ['class' => 'form-control']) !!}
</div>

<!-- Certificado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('certificado', 'Certificado:') !!}
	{!! Form::text('certificado', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha', 'Fecha:') !!}
	{!! Form::text('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('observacion', 'Observacion:') !!}
	{!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
