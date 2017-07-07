<style type="text/css">
.sidebar-nav li a:hover {
    text-decoration: none;
    color: #000;
    background: #999;
}
.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}
.sidebar-nav > .sidebar-brand a {
    color: #000000;
}
.sidebar-nav > .sidebar-brand a:hover {
    color: #000;
    background: #999;
}
</style>
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background:#fff" ">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#personal" data-scroll>Equipo</a>
                </li>
                <li class="sidebar-brand">
                    <a>
                        Etapas
                    </a>
                </li>
                <li>
                    <a href="#motivacion" data-scroll>Motivación</a>
                </li>
                <li>
                    <a href="#diagnostico" data-scroll>Diagnóstico</a>
                </li>
                <li>
                    <a href="#planificacion" data-scroll>Planificación</a>
                </li>
                <li>
                    <a href="#ejecucion" data-scroll>Ejecución</a>
                </li>
                <li>
                    <a href="#cierre" data-scroll>Cierre</a>
                </li>
                <li class="sidebar-brand">
                    <a>
                        Procesos Transversales
                    </a>
                </li>
                <li>
                    <a href="#">Reflexión</a>
                </li>
                <li>
                    <a href="#">Registro, Sistematización y Com.</a>
                </li>
                <li>
                    <a href="#">Evaluación</a>
                </li>
                @if(Auth::user()->rol=='Profesor') 
                <li class="sidebar-brand">
                    <a href="#graficos" data-scroll>Graficos</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <!--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span>  Menú de Fases</a><br></br>-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title" align="center">Proyecto </h1>
                            </div>
                            <div class="panel-body">
                                <!-- Id Profesor Field -->
                                <div class="form-group col-sm-4">
                                    {!! Form::label('project_name', 'Nombre del Proyecto:') !!}
                                    {!! $project->project_name!!}
                                </div>

                                <!-- Year Field -->
                                <div class="form-group col-sm-4">
                                    {!! Form::label('year', 'Año:') !!}
                                    <p>{!! $project->year !!}</p>
                                </div>

                                <!-- Id Course Field -->
                                <div class="form-group col-sm-4">
                                {!! Form::label('course', 'Curso:') !!}</br>
                                    @foreach($cursos as $c)
                                        @if ($c->id == $project->id_course)
                                         {!! $c->name_course!!}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel-footer">Cierre del Proyecto
                            <a type="button" " href="#" class="btn btn-primary">Cerrar</a>
                            </div>
                        </div>
                        <div class="row">
                        <legend id="personal"></legend>
                        @if(Auth::user()->rol=='Profesor') 
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h1 class="panel-title" align="center">Alumnos</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            @if($alumnos->isEmpty())
                                            <div class="well text-center">No existen Alumnos aún.</div>
                                                @else
                                                @include('alumnos.table2')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h1 class="panel-title" align="center">Profesores</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            @if($profesors->isEmpty())
                                            <div class="well text-center">No existen Profesores aún.</div>
                                                @else
                                                @include('profesors.table2')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h1 class="panel-title" align="center">Alumnos en el Proyecto</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="target" class="table table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Rut</th>
                                                  <th>Nombre</th>
                                                  <th>Rol</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($alumnoproyectos as $ap)
                                                 @if($project->id == $ap->id_proyecto) 
                                                <tr>
                                                  <td>{!! $ap->rut !!}</td>
                                                  <td>{!! $ap->nombre !!}</td>
                                                  <td>{!! $ap->rol !!}</td>
                                                  @if(Auth::user()->rol=='Profesor')
                                                  <td><button onclick="remove2(this)"  class="btn btn-xs btn-danger">Descartar</button> </td>@endif
                                                </tr>
                                                @endif
                                            @endforeach
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <legend id="motivacion">Motivación</legend>
        @if(Auth::user()->rol=='Alumno')
            @if($consultarrut->isEmpty())
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Formulario de la Etapa Motivación</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">

                            @include('common.errors')

                            {!! Form::open(['route' => 'motivations.store']) !!}

                                @include('motivations.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
    <legend id="diagnostico">Diagnostico</legend>
    <legend id="planificacion">Planificación</legend>
    <legend id="ejecucion">Ejecución</legend>
    <legend id="cierre">Cierre</legend>
    <legend id="graficos">Gráficos</legend>
    @if(Auth::user()->rol=='Profesor')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title" align="center">Grafico Motivación</h1>
            </div>
            <div class="panel-body">
                <div id="container1" style="width:100%; height:400px;">
                    <script type="text/javascript">
                        $(function () { 
                            var myChart = Highcharts.chart('container1', {
                              chart: {
                                  type: 'bar'
                              },
                              title: {
                                  text: 'Encuesta Motivacional'
                              },
                              xAxis: {
                                  categories: ['Pregunta 1', 'Pregunta 2','Pregunta 3','Pregunta 4']
                              },
                              yAxis: {
                                  title: {
                                      text: 'Comparación'
                                  }
                              },
                              series: [{
                                  name: 'SI',
                                  data: [{!!$countpregunta1si !!},{!!$countpregunta2si !!},{!!$countpregunta3si !!},{!!$countpregunta4si !!}]
                              }, {
                                  name: 'NO',
                                  data: [{!!$countpregunta1no !!},{!!$countpregunta2no !!},{!!$countpregunta3no !!},{!!$countpregunta4no !!}]
                              }]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    @endif

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->    



<script>
        /*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/


function add(button) {
    var row = button.parentNode.parentNode;
  var cells = row.querySelectorAll('td:not(:last-of-type)');
  addToCartTable(cells);
}
function add2(button) {
    var row = button.parentNode.parentNode;
  var cells = row.querySelectorAll('td:not(:last-of-type)');
  addToCartTable2(cells);
}

function remove() {
    var row = this.parentNode.parentNode;
    var cells = row.querySelectorAll('td:not(:last-of-type)');
    var rut2 = cells[0].innerText;
    var misDatos2 = {
    "rut" : rut2,
    "id_proyecto" : {!!$project->id!!} };
        $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '../alumnoproyectos/'+rut2,
        data: misDatos2,
        dataType:"json",
        cache : false,
        success: function(data){
            if(data.success == true){
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        },

    });


    document.querySelector('#target tbody')
            .removeChild(row);
}
function remove2(button) {
    var row = button.parentNode.parentNode;
    var cells = row.querySelectorAll('td:not(:last-of-type)');
    var rut2 = cells[0].innerText;
    var misDatos2 = {
    "rut" : rut2,
    "id_proyecto" : {!!$project->id!!} };
        $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '../alumnoproyectos/'+rut2,
        data: misDatos2,
        dataType:"json",
        cache : false,
        success: function(data){
            if(data.success == true){
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        },

    });

    document.querySelector('#target tbody')
            .removeChild(row);
}

function addToCartTable(cells) {
   var rut = cells[0].innerText;
   var nombre = cells[1].innerText;
   var rol = cells[3].innerText;
   var misDatos = {
    "rut" : rut,
    "rol" : rol,
    "nombre" : nombre,
    "id_proyecto" : {!!$project->id!!},
    "nombre_proyecto" : "{!!$project->project_name!!}", }
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '../alumnoproyectos/store',
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

   
   var newRow = document.createElement('tr');
   
   newRow.appendChild(createCell(rut));
   newRow.appendChild(createCell(nombre));
   newRow.appendChild(createCell(rol));

   var cellRemoveBtn = createCell();
   cellRemoveBtn.appendChild(createRemoveBtn())
   newRow.appendChild(cellRemoveBtn);
   
   document.querySelector('#target tbody').appendChild(newRow);
}
function addToCartTable2(cells) {
   var rut = cells[0].innerText;
   var nombre = cells[1].innerText;
   var rol = cells[3].innerText;
   var misDatos = {
    "rut" : rut,
    "rol" : rol,
    "nombre" : nombre,
    "id_proyecto" : {!!$project->id!!},
    "nombre_proyecto" : "{!!$project->project_name!!}", }
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '../alumnoproyectos/store',
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

   
   var newRow = document.createElement('tr');
   
   newRow.appendChild(createCell(rut));
   newRow.appendChild(createCell(nombre));
   newRow.appendChild(createCell(rol));

   var cellRemoveBtn = createCell();
   cellRemoveBtn.appendChild(createRemoveBtn())
   newRow.appendChild(cellRemoveBtn);
   
   document.querySelector('#target tbody').appendChild(newRow);
}

function createInputQty() {
    var inputQty = document.createElement('input');
  inputQty.type = 'number';
  inputQty.required = 'true';
  inputQty.min = 1;
  inputQty.className = 'form-control'
  return inputQty;
}

function createRemoveBtn() {
    var btnRemove = document.createElement('button');
  btnRemove.className = 'btn btn-xs btn-danger';
  btnRemove.onclick = remove;
  btnRemove.innerText = 'Descartar';
  return btnRemove;
}

function createCell(text) {
    var td = document.createElement('td');
  if(text) {
    td.innerText = text;
  }
  return td;
}
</script>

<style type="text/css">
*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
#target td {
  /* para centrado vertical de contenido */
  vertical-align: middle;
}


</style>

