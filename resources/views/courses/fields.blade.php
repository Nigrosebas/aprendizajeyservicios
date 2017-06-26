<!-- Id University Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_university', 'Id University:') !!}
	{!! Form::text('id_university', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Faculty Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_faculty', 'Id Faculty:') !!}
	{!! Form::text('id_faculty', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Course Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_course', 'Name Course:') !!}
	{!! Form::text('name_course', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
