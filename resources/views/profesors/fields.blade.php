<!-- Rut Profesor Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_profesor', 'Rut Profesor:') !!}
	{!! Form::text('rut_profesor', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
	{!! Form::hidden('rut_profesor', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Telefono:') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Perfil Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('foto_perfil', 'Foto Perfil:') !!}
	{!! Form::text('foto_perfil', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::Label('id_university', 'Universidad :') !!}
    {!! Form::text('id_universit', Auth::user()->profesor->universidad->nombre_u, ['class' => 'form-control','disabled' => 'disabled']) !!}
    {!! Form::hidden('id_university', Auth::user()->profesor->universidad->id, ['class' => 'form-control']) !!}
			</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
