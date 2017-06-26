<!-- Id University Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_university', 'Id University:') !!}
	{!! Form::text('id_university', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Faculty Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_carrera', 'Nombre Carrera:') !!}
	{!! Form::text('nombre_carrera', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
