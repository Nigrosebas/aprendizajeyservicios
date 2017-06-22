<!-- Rut Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_encargado', 'Rut Encargado:') !!}
	{!! Form::text('rut_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_encargado', 'Nombre Encargado:') !!}
	{!! Form::text('nombre_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email_encargado', 'Email Encargado:') !!}
	{!! Form::email('email_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono_encargado', 'Telefono Encargado:') !!}
	{!! Form::text('telefono_encargado', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Web Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('web', 'Web:') !!}
	{!! Form::text('web', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pais', 'Pais:') !!}
	{!! Form::text('pais', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
