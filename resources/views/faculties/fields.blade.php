<!-- Id University Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_university', 'Id University:') !!}
	{!! Form::text('id_university', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Facultad Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_facultad', 'Nombre Facultad:') !!}
	{!! Form::text('nombre_facultad', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
