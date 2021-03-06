<!-- Rut Field -->
<div class="form-group">
	<div class="form-group col-sm-6">
	    {!! Form::label('rut', 'Rut:') !!} Sin Guión, sin puntos ni codigo verificador.

		{!! Form::text('rut', null, ['class' => 'form-control']) !!}
	</div>


	<!-- Rol Field -->
	@if(Auth::guest())
	<div class="form-group col-sm-6">
	    {!! Form::label('rol', 'Rol:') !!}
		{!! Form::select('rol',['Alumno' => 'Alumno', 'Empresa' => 'Empresa'],null,['class' => 'form-control']) !!}
	</div>
	@endif
	@if(Auth::check())
		@if(Auth::user()->rol=='Administrador')
			<div class="form-group col-sm-6">
		    	{!! Form::label('rol', 'Rol:') !!}
				{!! Form::select('rol',['Coordinador' => 'Coordinador'],null,['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-sm-6">
    			{!! Form::Label('id_university', 'Universidad :') !!}
    			{!! Form::select('id_university', $universidades, null, ['class' => 'form-control']) !!}
			</div>
		@endif
		@if(Auth::user()->rol=='Coordinador')
			<div class="form-group col-sm-6">
		    	{!! Form::label('rol', 'Rol:') !!}
				{!! Form::select('rol',['Profesor' => 'Profesor'],null,['class' => 'form-control']) !!}
			</div>
				<div class="form-group col-sm-6">
    			{!! Form::Label('id_university', 'Universidad :') !!}
    			{!! Form::label('id_universit', Auth::user()->coordinador->universidad->nombre_u, null, ['class' => 'form-control']) !!}
    			{!! Form::hidden('id_university', Auth::user()->coordinador->universidad->id, ['class' => 'form-control']) !!}
			</div>
		@endif
	@endif

	<!-- Nombre Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('nombre', 'Nombre:') !!}
		{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Usuario Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('usuario', 'Usuario:') !!}
		{!! Form::text('usuario', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Password Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>


	<!-- Submit Field -->
	<div class="form-group col-sm-6">
	    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	</div>
</div>

