<!-- Rut Alumno Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_alumno', 'Rut Alumno:') !!}
	{!! Form::text('rut_alumno', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
	{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Telefono:') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::text('region', null, ['class' => 'form-control']) !!}
</div>


<!-- Ciudad Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ciudad', 'Ciudad:') !!}
	{!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('direccion', 'Direccion:') !!}
	{!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Perfil Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto_perfil', 'Foto Perfil:') !!}
	{!! Form::text('foto_perfil', null, ['class' => 'form-control']) !!}
</div>

<!-- Licencia Conducir Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('licencia_conducir', 'Licencia Conducir:') !!}
	{!! Form::text('licencia_conducir', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
	{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
