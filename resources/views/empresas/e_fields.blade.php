<!-- Rut Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut_encargado', 'Rut Encargado:') !!}
    {!! Form::text('rut_encargado', null, ['class' => 'form-control','disabled' => 'true']) !!}
    {!! Form::hidden('rut_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_encargado', 'Nombre Encargado:') !!}
    {!! Form::text('nombre_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email_encargado', 'Email Encargado:') !!}
    {!! Form::email('email_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Encargado Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono_encargado', 'Telefono Encargado:') !!}
    {!! Form::text('telefono_encargado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Empresa Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_empresa', 'Nombre Empresa:') !!}
    {!! Form::text('nombre_empresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Clasificacion Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('clasificacion', 'Clasificacion:') !!}
    {!! Form::select('clasificacion',['Industrial' => 'Industrial','Comercial' => 'Comercial','Servicios' => 'Servicios'],null,['class' => 'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => '
Empresas Industriales : Son aquellas empresas en donde la actividad es la producción de bienes por medio de la transformación o extracción de las materias primas.
Empresas Comerciales : Se trata de empresas intermediarias entre el productor y el consumidor en donde su principal función es la compra y venta de productos terminados aptos para la comercialización.
Empresas de servicios : Son empresas que brindan  servicios a la comunidad, pudiendo tener o no fines de lucro.']) !!}
</div>


<!-- Web Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('web', 'Web:') !!}
    {!! Form::url('web', null, ['class' => 'form-control','placeholder'=>'http://www.URLempresa.com']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pais', 'Pais:') !!}
    {!! Form::select('pais',['Chile' => 'Chile','Argentina' => 'Argentina','Perú' => 'Perú','Bolivia' => 'Bolivia','Otro'=>'Otro'], null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>