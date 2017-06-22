<!-- Id Alumno Field -->
	{!! Form::hidden('id_alumno', Auth::user()->alumno->id, ['class' => 'form-control']) !!}

<!-- Idioma Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('idioma', 'Idioma:') !!}
    {!! Form::select('idioma',(['0' => 'Selecciona un Idioma'] + $lenguajes->toArray()), null,['class' => 'form-control']) !!}
</div>
<!-- Lectura Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('lectura', 'Lectura:') !!}
    {!! Form::select('lectura',['Básico' => 'Básico', 'Intermedio' => 'Intermedio', 'Avanzado' => 'Avanzado'], null,['class' => 'form-control']) !!}
</div>

<!-- Escritura Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('escritura', 'Escritura:') !!}
	{!! Form::select('escritura',['Básico' => 'Básico','Intermedio' => 'Intermedio','Avanzado' => 'Avanzado'], null,['class' => 'form-control']) !!}
</div>

<!-- Conversacion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('conversacion', 'Conversacion:') !!}
	{!! Form::select('conversacion',['Básico' => 'Básico','Intermedio' => 'Intermedio','Avanzado' => 'Avanzado'], null,['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
