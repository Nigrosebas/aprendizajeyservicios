<!-- Id University Field -->

	{!! Form::hidden('id_university', Auth::user()->coordinador->universidad->id, ['class' => 'form-control']) !!}

<!-- Nombre Facultad Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_facultad', 'Nombre Facultad:') !!}
	{!! Form::text('nombre_facultad', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
