<!-- Nombre Coordinador Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre Coordinador:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Coordinador Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_coordinador', 'Rut Coordinador:') !!}
	{!! Form::text('rut_coordinador', null, ['class' => 'form-control']) !!}
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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
