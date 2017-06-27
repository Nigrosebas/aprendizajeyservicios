
{!! Form::hidden('id_university', Auth::user()->coordinador->universidad->id, ['class' => 'form-control']) !!}

<!-- Id Faculty Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_faculty', 'Facultad:') !!}
	{!! Form::select('id_faculty', $facultades,null, ['class' => 'form-control']) !!}
</div>

<!-- Name Course Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_course', 'Nombre del Curso:') !!}
	{!! Form::text('name_course', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
