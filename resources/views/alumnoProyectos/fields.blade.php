<!-- Id Proyecto Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
	{!! Form::text('id_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut', 'Rut:') !!}
	{!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Rol Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rol', 'Rol:') !!}
	{!! Form::text('rol', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
