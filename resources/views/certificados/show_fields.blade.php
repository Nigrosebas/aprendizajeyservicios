<!-- Id Alumno Field -->
<div class="form-group">
    {!! Form::label('id_alumno', 'Id Alumno:') !!}
    <p>{!! $certificado->id_alumno !!}</p>
</div>

<!-- Certificadora Field -->
<div class="form-group">
    {!! Form::label('certificadora', 'Certificadora:') !!}
    <p>{!! $certificado->certificadora !!}</p>
</div>

<!-- Certificado Field -->
<div class="form-group">
    {!! Form::label('certificado', 'Certificado:') !!}
    <p>{!! $certificado->certificado !!}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $certificado->fecha !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $certificado->observacion !!}</p>
</div>

