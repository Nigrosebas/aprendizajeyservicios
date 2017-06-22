<!-- Rut Profesor Field -->
<div class="form-group">
    {!! Form::label('rut_profesor', 'Rut Profesor:') !!}
    <p>{!! $profesor->rut_profesor !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $profesor->email !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $profesor->telefono !!}</p>
</div>

<!-- Foto Perfil Field -->
<div class="form-group">
    {!! Form::label('foto_perfil', 'Foto Perfil:') !!}
    <p>{!! $profesor->foto_perfil !!}</p>
</div>

<!-- Foto Perfil Field -->
<div class="form-group">
    {!! Form::label('id_university', 'Universidad :') !!}
    <p>{!! Auth::user()->profesor->universidad->nombre_u !!}</p>
</div>

