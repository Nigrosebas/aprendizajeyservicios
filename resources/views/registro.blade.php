@extends('layouts.app')
@section('content')
<div class="container theme-showcase" role="main">
@include('flash::message')
@if(Auth::guest())

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h1 class="panel-title" align="center">Noticias</h1>
      	</div>
      	<div class="panel-body">
      		<div id="container1">
      		Para acceder a crear una cuenta como Encargado de Proyectos de Aprendizaje por Servicio para su entidad Educativa, envié un correo al
      		<a href="mailto:sebastian.vqz@gmail.com?subject=Creacion de cuentas&cc=mtoranzo@ucm.cl&body=Nombre%0ARut :%0ATelefono :%0ANombre Entidad Educativa :%0AMotivo por el cual desea ocupar la herramienta :%0A¿Cómo llegó a conocer ésta herramienta? : %0AGracias por ponerse en contacto, le responderemos lo antes posible con sus datos%0A" target="_blank" ">Administrador.</a>


            </div>
     	</div>
    </div>


@endif
</div>



@endsection