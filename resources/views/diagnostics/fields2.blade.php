<!-- Id Project Field -->



	{!! Form::hidden('rut', Auth::user()->rut, ['class' => 'form-control']) !!}

<!-- Pregunta1 Field -->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('pregunta1', 'Pregunta1:') !!}
	{!! Form::select('pregunta1',['No' => 'No','Si'=>'Si'], null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta2 Field -->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('pregunta2', 'Pregunta2:') !!}
	{!! Form::select('pregunta2',['No' => 'No','Si'=>'Si'], null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta3 Field -->
<div class="form-group col-sm-6 col-lg-12">
    {!! Form::label('pregunta3', 'Pregunta3:') !!}
	{!! Form::select('pregunta3',['No' => 'No','Si'=>'Si'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>