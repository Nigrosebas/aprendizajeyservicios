<!-- Id Alumno Field -->
	{!! Form::hidden('id_alumno', Auth::user()->alumno->id, ['class' => 'form-control']) !!}

<!-- Conocimiento Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conocimiento', 'Conocimiento:') !!}
	{!! Form::text('conocimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nivel', 'Nivel:') !!}
	{!! Form::text('nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comentario', 'Comentario:') !!}
	{!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
