<!-- Id Project Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_project', 'Id Project:') !!}
	{!! Form::text('id_project', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut', 'Rut:') !!}
	{!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta1 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pregunta1', 'Pregunta1:') !!}
	{!! Form::text('pregunta1', null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pregunta2', 'Pregunta2:') !!}
	{!! Form::text('pregunta2', null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta3 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pregunta3', 'Pregunta3:') !!}
	{!! Form::text('pregunta3', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
