
@extends('layouts.app')
@section('content')
    <!-- Fixed navbar -->
<div class="container theme-showcase" role="main">
@include('flash::message')
@if(Auth::check())
<script type="text/javascript">
  document.body.style.background = "@foreach($colorcito as $col){!!($col['code_background'])!!}@endforeach"
</script>
@endif
@if(Auth::guest())

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src={!! asset('package/images/slide1.png')!!} alt="1">
          <div class="carousel-caption">
            <h3>Aprendizaje por Servicio</h3>
            <p>Descripción Importante</p>
          </div>
        </div>

        <div class="item">
          <img src={!! asset('package/images/slide2.png')!!} alt="2"> 
          <div class="carousel-caption">
            <h3>Banco de Proyectos A+S</h3>
            <p></p>
          </div>
        </div>

        <div class="item">
          <img src={!! asset('package/images/slide3.png')!!} alt="3">
          <div class="carousel-caption">
            <h3>Colabora con Nosotros!</h3>
            <p>Con tu información todos vamos mejorando.</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br>
    <div class="panel panel-default">
      <div class="panel-heading">
         <h1 class="panel-title" align="center">Noticias</h1>
      </div>
      <div class="panel-body" align="center">
      Desde acá se pueden acceder a los PROYECTOS ya terminados.
      <a href="{!! route('projects.pcompleted') !!}"><i class="glyphicon glyphicon-edit"></i></a>
     </div>
    </div>

@endif
@if(Auth::check())
  @if(Auth::user()->rol=='Alumno') 

    <div class="panel panel-default">
      <div class="panel-heading">
         <h1 class="panel-title" align="center">Opciones</h1>
      </div>
      <div class="panel-body">
        <div class="btn-group btn-group-justified" role="group">
          <div class="btn-group" role="group">
            <a type="button" href="{!! asset('alumnos/'.Auth::user()->alumno->id.'/edit')!!}" class="btn btn-default">Editar Perfil</a>
          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
         <h1 class="panel-title" align="center">Proyectos Asignados</h1>
      </div>
      <div class="panel-body">
          @if($projects->isEmpty())
            <div class="well text-center">No Projects found.</div>
          @else
          <table class="table">
            <thead>
              <th>Nombre Proyecto</th>
              <th width="150px">Acceso</th>
            </thead>
          <tbody>
         @foreach($alumnoproyectos as $aps)

            @if($aps->rut == Auth::user()->alumno->rut_alumno) 
            
              <tr>
              <td>{!!$aps->nombre_proyecto!!}</td>
              <td><a href="{!! route('projects.show', [$aps->id_proyecto]) !!}"><i class="glyphicon glyphicon-th"></i></a></td>
              </tr>
            @endif
          @endforeach
        @endif
      </div>
    </div>


  @endif
  @if(Auth::user()->rol=='Administrador') 

    <div class="panel panel-default">
      <div class="panel-heading">
         <h1 class="panel-title" align="center">Bienvenido Administrador</h1>
      </div>
      <div class="panel-body">
      <!-- Button trigger modal -->
        <a type="button" href="{!!asset('usuarios/create')!!}" class="btn btn-primary btn-lg">
          Añadir Coordinadores de Carrera
        </a>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
         <h1 class="panel-title" align="center">Noticias</h1>
      </div>
      <div class="panel-body" align="center">
      Actualmente hay {!! $countproyectosvigentes!!} Proyectos Vigentes.
      <br> De los cuales {!! $countproyectosterminados!!} están Terminados.

     </div>
    </div>
  @endif




  @if(Auth::user()->rol=='Profesor') 

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title" align="center">Bienvenido a la Interfaz de Profesor</h1>
      </div>
      <div class="panel-body">
        Hola {!!  Auth::user()->profesor->nombre !!}, su cuenta está configurada con la {!! Auth::user()->profesor->universidad->nombre_u !!}
        <br>
        Si el curso en el cual usted desea generar el proyecto no se encuentra, contactese con su Coordinador de A+S.
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="panel-title" align="center">Información</h1>
          </div>
          <div class="panel-body">
            Recuerde rellenar todos los campos requeridos del perfil.
          </div>
        </div>
      </div>

        <div class="col-md-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h1 class="panel-title" align="center">Proyectos</h1>
            </div>
            <div class="panel-body" align="center">
              <a type="button" class="btn btn-default" href="{!!asset('projects/create')!!}" class="btn btn-default">Generar Nuevo Proyecto A+S</a>
              <a type="button" class="btn btn-default" href="{{asset('projects/'.Auth::user()->profesor->id.'/mostrar')}}" class="btn btn-default">Ver Lista de Proyectos</a>
            </div>
          </div>
        </div>
      </div>

    <div class="panel panel-danger">
      <div class="panel-heading">
        <h1 class="panel-title" align="center">Perfil</h1>
      </div>
      <div class="panel-body">
          <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-info" href="{!!asset('profesors/'.Auth::user()->profesor->id.'/edit')!!}" class="btn btn-default">Editar Perfil</a>
          </div>
          <br><br><br>
          <div>

        <?php $profesor=Auth::user()->profesor ?>
          @include('profesors.show_fields')
          </div>
      </div>
    </div>
  @endif

  @if(Auth::user()->rol=='Coordinador') 

      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title" align="center">Bienvenido a la Interfaz de Coordinador de A+S</h1>
        </div>
        <div class="panel-body">
          <h2>Hola {!! Auth::user()->coordinador->nombre !!}, su cuenta está configurada con la {!! Auth::user()->coordinador->universidad->nombre_u !!}<br></h2>
          <h2>Recuerde Añadir las Facultades, Cursos, Alumnos y Profesores al sistema. (En ese orden) .</h2>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title" align="center">Logo Universidad</h1>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
               <div class="panel panel-default">
                  <div class="panel-heading">Información</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-6 ">
                          <a class="thumbnail">
                            <img src="{{ asset('storage/1.jpg') }}" alt="400x300">
                          </a>
                        </div>
                        {!! Form::label('Seleccionar Color de Fondo :') !!}
                        <div class="col-xs-6 ">
                          <div id="cp2" class="input-group colorpicker-component">
                            <input type="text" value="#1d6145" id="color_fondo" class="form-control" />
                            <span class="input-group-addon"><i></i></span>
                          </div>
                          <a class="btn btn-sm btn-default enable-button" onclick="cambio_color(this)">Confirmar Color</a>

                        </div>
                        <script>
                            $(function() {
                                $('#cp2').colorpicker();
                                $('#cp2').colorpicker().on('changeColor', function(e) {
                                                    $('body')[0].style.backgroundColor = e.color.toString(
                                                        'rgba');
                                                  });
                            });
                        </script>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">Agregar archivos</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'storage.store', 'files' => true]) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                          <label class="col-md-3 control-label">Nuevo Archivo</label>
                          <div class="col-md-9">
                            <input type="file" class="form-control" name="image" >
                          </div>
                        </div>
             
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                          </div>
                        </div>

                        {!! Form::close() !!}
  
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title" align="center">Facultades</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('faculties.create') !!}">Añadir Nueva Facultad</a>
          </div>
          <br>
          <div class="row">
            @if($faculties->isEmpty())
                <div class="well text-center">No Faculties found.</div>
            @else
                @include('faculties.table')
            @endif
          </div>
          @include('common.paginate', ['records' => $faculties])
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title" align="center">Cursos</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('courses.create') !!}">Añadir Nuevo Curso</a>
          </div>
          <br>
           <div class="row">
            @if($courses->isEmpty())
                <div class="well text-center">No Courses found.</div>
            @else
                @include('courses.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $courses])
        </div>
      </div>

      <a href="#demo" class="btn btn-info" data-toggle="collapse">Crear Profesor</a>

      <!--<a href="#demo2" class="btn btn-info" data-toggle="collapse">Añadir Cursos</a>-->
      <div id="demo" class="collapse">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title" align="center">Creación de Profesor</h1>
          </div>
          <div class="panel-body">
                {!! Form::open(['route' => 'usuarios.store']) !!}

                @include('usuarios.fields')

                {!! Form::close() !!}
          </div>
        </div>
      </div>
      <div id="demo2" class="collapse">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title" align="center">Cargar Ramos</h1>

          </div>
          <div class="panel-body">
            <div class="container col-md-10">
              <a href="{{ URL::to('downloadExcelCursos/csv') }}"><button class="btn btn-success">Descargar Planilla CSV</button></a><br>
              <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" class="form-group">
                {!! Form::open(['route' => 'importExcelCursos','method' => 'post','enctype' => 'multipart/form-data','class'=>'form-horizontal','data-allowed-file-extensions'=>'["csv"]' ]) !!}
                <input type="file" name="import_file" />
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
              </div>
                <button class="btn btn-primary">Importar Archivo</button>
                {!! Form::close() !!}
            </div>
          </div>      
        </div>
      </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="panel-title" align="center">Cargar Alumnos</h1>

                </div>
                <div class="panel-body"><a align="right" type="button" class="btn btn-info btn-sm" data-container="body" data-toggle="popover" data-placement="right" data-content="En la columna Rut de la planilla rellenar sin puntos, ni guion, ni digito verificador."><span class="glyphicon glyphicon-info-sign"></span></a>
                  <div class="container col-md-10">
                    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar Planilla CSV</button></a><br>
                    <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" class="form-group">
                      {!! Form::open(['route' => 'importExcel','method' => 'post','enctype' => 'multipart/form-data','class'=>'form-horizontal','data-allowed-file-extensions'=>'["csv"]' ]) !!}

                      <input type="file" name="import_file" />
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    </div>
                      <button class="btn btn-primary">Importar Archivo</button>
                      {!! Form::close() !!}
                  </div>
                </div>      
              </div>
            </div>
            <div class=" col-sm-6 ">
              <div class="panel panel-default">
                <div class="panel-heading ">
                  <h1 class="panel-title" align="center">Cargar Profesor</h1>
                </div>
                <div class="panel-body"><a align="right" type="button" class="btn btn-info btn-sm" data-container="body" data-toggle="popover" data-placement="right" data-content="En la columna Rut de la planilla rellenar sin puntos, ni guion, ni digito verificador."><span class="glyphicon glyphicon-info-sign"></span></a>
                  <div class="container col-md-10">
                    <a href="{{ URL::to('downloadExcelProfesor/csv') }}"><button class="btn btn-success">Descargar Planilla CSV</button></a><br>
                    <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" class="form-group">
                      {!! Form::open(['route' => 'importExcelProfesor','method' => 'post','enctype' => 'multipart/form-data','class'=>'form-horizontal','data-allowed-file-extensions'=>'["csv"]' ]) !!}
                        <input type="file" name="import_file" />
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    </div>
                    <button class="btn btn-primary">Importar Archivo</button>
                      {!! Form::close() !!}
                  </div>
                </div>      
              </div>
            </div>
          </div><br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="panel-title" align="center">Graficos</h1>
                </div>
                <div class="panel-body">
                  <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        $(function () { 
                            var myChart3 = Highcharts.chart('container3', {

                            title: {
                                text: 'Cantidad de Proyectos por Facultad en Periodo 2017 - '
                            },

                            subtitle: {
                                text: 'Fuente: Herramienta Web A+S'
                            },

                            yAxis: {
                                title: {
                                    text: 'Cantidad de Proyectos'
                                }
                            },
                            xAxis: {
                              allowDecimals: false,
                            },

                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {
                                    pointStart: 2017
                                }
                            },

                            series: [ 
                               @foreach($test as $test2)
                               { name : '{!! $test2->name_faculty !!}',
                                 data : [{!!$test2->Cantidad !!},]
                                },
                                  @endforeach
                              ]

                        });
                      });
                    </script>
                </div>
              </div>      
            </div>
  @endif
@endif

</div>
<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
}) 
</script>
@if(Auth::check())
  @if(Auth::user()->rol=='Coordinador') 
<script type="text/javascript">
  function cambio_color() {
  var color = document.getElementById("color_fondo").value;
  var misDatos = {
    "id_university" : {!!Auth::user()->Coordinador->id_university !!},
    "code_background" : color}
  $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'{{ route("backgrounds.store")}}',
        data: misDatos,
        dataType:"json",
        cache : false,
        success: function(data){
            if(data.success == true){
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        },

    });
  };
</script>
@endif
@endif


@endsection
