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
.sidebar-nav > .sidebar-brand {
    height: 45px;
    font-size: 15px;
    line-height: 40px;
}
.sidebar-nav li {
    text-indent: 15px;
    line-height: 35px;
}

</style>
<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
})    
</script>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background:#fff" >

            <ul class="sidebar-nav" style="position: absolute">
                <li class="sidebar-brand">
                    <a href="#personal" data-scroll>Equipo</a>
                </li>
                <li class="sidebar-brand">
                    <a>Etapas y Procesos</a>
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
                    <a>Procesos Transversales</a>
                </li>
                <li>
                    <a href="#">Reflexión</a>
                </li>
                <li>
                    <a href="#">Registro, Sistematización y Com.</a>
                </li>
                <li>
                    <a href="#evaluacion">Evaluación</a>
                </li>
                @if(Auth::user()->rol=='Profesor') 
                <li class="sidebar-brand">
                    <a href="#graficos" data-scroll>Graficos</a>
                </li>
                <li class="sidebar-brand">
                    <a href="#cierreproyecto" data-scroll>Cerrar Proyecto</a>
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
                        </div>
                        <div class="row">
                        <legend id="personal"></legend>
                        @if(Auth::user()->rol=='Profesor') 
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h1 class="panel-title" align="center">
                                        <a data-toggle="collapse" href="#collapseAlumnos">Alumnos</a>
                                        </h1>
                                    </div>
                                    <div id="collapseAlumnos" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                @include('alumnos.table2')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h1 class="panel-title" align="center">
                                        <a data-toggle="collapse" href="#collapseProfesores">Profesores</a>
                                        </h1>
                                    </div>
                                    <div id="collapseProfesores" class="panel-collapse collapse">
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
            @if($consultarrutmotivation->isEmpty())
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
            @else <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Formulario</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            Formulario ya respondido el {!!($createdmoti->created_at)!!}
                            <br>
                            Si desea modificarlo click acá.
                            <a href="{!! route('motivations.edit', [$createdmoti->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
        <legend id="diagnostico">Diagnostico</legend>
        @if(Auth::user()->rol=='Alumno')
            @if($consultarrutdiagnostic->isEmpty())
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapsediag">Formulario de la Etapa Diagnostico</a>
                        </h4>
                    </div>
                    <div id="collapsediag" class="panel-collapse collapse">
                        <div class="panel-body">

                            @include('common.errors')

                            {!! Form::open(['route' => 'diagnostics.store']) !!}

                                @include('diagnostics.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @else <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapsediag2">Formulario</a>
                        </h4>
                    </div>
                    <div id="collapsediag2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Formulario ya respondido el {!!($createddiag->created_at)!!}
                            <br>
                            Si desea modificarlo click acá.
                            <a href="{!! route('diagnostics.edit', [$createddiag->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
    <legend id="planificacion">Planificación</legend>
        @if(Auth::user()->rol=='Alumno')
            @if($consultarrutplanification->isEmpty())
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseplan">Formulario de la Etapa Planificación</a>
                        </h4>
                    </div>
                    <div id="collapseplan" class="panel-collapse collapse">
                        <div class="panel-body">

                            @include('common.errors')

                            {!! Form::open(['route' => 'planifications.store']) !!}

                                @include('planifications.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @else <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseplan2">Formulario</a>
                        </h4>
                    </div>
                    <div id="collapseplan2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Formulario ya respondido el {!!($createdplan->created_at)!!}
                            <br>
                            Si desea modificarlo click acá.
                            <a href="{!! route('planifications.edit', [$createdplan->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
    <legend id="ejecucion">Ejecución</legend>
        @if(Auth::user()->rol=='Alumno')
            @if($consultarrutexecution->isEmpty())
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseexe">Formulario de la Etapa Ejecución</a>
                        </h4>
                    </div>
                    <div id="collapseexe" class="panel-collapse collapse">
                        <div class="panel-body">

                            @include('common.errors')

                            {!! Form::open(['route' => 'executions.store']) !!}

                                @include('executions.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @else <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseexe2">Formulario</a>
                        </h4>
                    </div>
                    <div id="collapseexe2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Formulario ya respondido el {!!($createdexec->created_at)!!}
                            <br>
                            Si desea modificarlo click acá.
                            <a href="{!! route('executions.edit', [$createdexec->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
    <legend id="cierre">Cierre</legend>
    @if(Auth::user()->rol=='Alumno')
            @if($consultarrutclosing->isEmpty())
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseclos">Formulario de la Etapa Ejecución</a>
                        </h4>
                    </div>
                    <div id="collapseclos" class="panel-collapse collapse">
                        <div class="panel-body">

                            @include('common.errors')

                            {!! Form::open(['route' => 'closings.store']) !!}

                                @include('closings.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @else <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseclos2">Formulario</a>
                        </h4>
                    </div>
                    <div id="collapseclos2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Formulario ya respondido el {!!($createdclos->created_at)!!}
                            <br>
                            Si desea modificarlo click acá.
                            <a href="{!! route('closings.edit', [$createdclos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    @endif
    @if(Auth::user()->rol=='Profesor') 

    @endif
    <legend id="evaluacion">Evaluación</legend>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2">Formulario de la Etapa Evaluación</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                    Formulario o Encuesta ocupada por (Caire,2015)
                    Esperando respuesta para poder ocuparla.

                    </div>
                </div>
            </div>
        </div>
    @if(Auth::user()->rol=='Profesor')
    <legend id="graficos">Gráficos</legend>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapsemotivacion">Grafico Motivacion</a>
                </h4>
            </div>
            <div id="collapsemotivacion" class="panel-collapse collapse">
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
                                      data: [{!!$countmotpregunta1si !!},{!!$countmotpregunta2si !!},{!!$countmotpregunta3si !!},{!!$countmotpregunta4si !!}]
                                  }, {
                                      name: 'NO',
                                      data: [{!!$countmotpregunta1no !!},{!!$countmotpregunta2no !!},{!!$countmotpregunta3no !!},{!!$countmotpregunta4no !!}]
                                  }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapsediagnostico">Grafico Diagnostico</a>
                </h4>
            </div>
            <div id="collapsediagnostico" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="containerdiag" style="width:100%; height:400px;">
                        <script type="text/javascript">
                            $(function () { 
                                var myChart = Highcharts.chart('containerdiag', {
                                  chart: {
                                      type: 'bar'
                                  },
                                  title: {
                                      text: 'Encuesta Diagnostico'
                                  },
                                  xAxis: {
                                      categories: ['Pregunta 1', 'Pregunta 2','Pregunta 3']
                                  },
                                  yAxis: {
                                      title: {
                                          text: 'Comparación'
                                      }
                                  },
                                  series: [{
                                      name: 'SI',
                                      data: [{!!$countdiagpregunta1si !!},{!!$countdiagpregunta2si !!},{!!$countdiagpregunta3si !!}]
                                  }, {
                                      name: 'NO',
                                      data: [{!!$countdiagpregunta1no !!},{!!$countdiagpregunta2no !!},{!!$countdiagpregunta3no !!}]
                                  }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseplanificacion">Grafico Planificación</a>
                </h4>
            </div>
            <div id="collapseplanificacion" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="container3" style="width:100%; height:400px;">
                        <script type="text/javascript">
                            $(function () { 
                                var myChart = Highcharts.chart('container3', {
                                  chart: {
                                      type: 'bar'
                                  },
                                  title: {
                                      text: 'Encuesta Planificación'
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
                                      data: [{!!$countplanpregunta1si !!},{!!$countplanpregunta2si !!}]
                                  }, {
                                      name: 'NO',
                                      data: [{!!$countplanpregunta1no !!},{!!$countplanpregunta2no !!}]
                                  }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseejecucion">Grafico Ejecución</a>
                </h4>
            </div>
            <div id="collapseejecucion" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="container4" style="width:100%; height:400px;">
                        <script type="text/javascript">
                            $(function () { 
                                var myChart = Highcharts.chart('container4', {
                                  chart: {
                                      type: 'bar'
                                  },
                                  title: {
                                      text: 'Encuesta Ejecución'
                                  },
                                  xAxis: {
                                      categories: ['Pregunta 1', 'Pregunta 2','Pregunta 3']
                                  },
                                  yAxis: {
                                      title: {
                                          text: 'Comparación'
                                      }
                                  },
                                  series: [{
                                      name: 'SI',
                                      data: [{!!$countexepregunta1si !!},{!!$countexepregunta2si !!},{!!$countexepregunta3si !!}]
                                  }, {
                                      name: 'NO',
                                      data: [{!!$countexepregunta1no !!},{!!$countexepregunta2no !!},{!!$countexepregunta3no !!}]
                                  }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapsecierre">Grafico Cierre</a>
                </h4>
            </div>
            <div id="collapsecierre" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="container5" style="width:100%; height:400px;">
                        <script type="text/javascript">
                            $(function () { 
                                var myChart = Highcharts.chart('container5', {
                                  chart: {
                                      type: 'bar'
                                  },
                                  title: {
                                      text: 'Encuesta Cierre'
                                  },
                                  xAxis: {
                                      categories: ['Pregunta 1', 'Pregunta 2','Pregunta 3']
                                  },
                                  yAxis: {
                                      title: {
                                          text: 'Comparación'
                                      }
                                  },
                                  series: [{
                                      name: 'SI',
                                      data: [{!!$countclopregunta1si !!},{!!$countclopregunta2si !!},{!!$countclopregunta3si !!}]
                                  }, {
                                      name: 'NO',
                                      data: [{!!$countclopregunta1no !!},{!!$countclopregunta2no !!},{!!$countclopregunta3no !!}]
                                  }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <legend id="cierreproyecto">Cierre Proyecto</legend>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapsefin">Finalización de Proyecto</a>
                </h4>
            </div>
            {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}
            <div id="collapsefin" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group col-sm-6 col-lg-12">
                    Con finalidad de poder mostrar éste proyecto y que sirva de ayuda, se debe completar lo siguiente:
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('estado', 'Estado Final del Proyecto :') !!}
                        {!! Form::select('estado',['Terminado' => 'Terminado','Cancelado'=>'Cancelado'], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('porcentaje', 'El Proyecto según su parecer alcanzó un :') !!}<br></br>
                       <b>0%   </b>         <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value=""/><b> 100% </b><span id="ex6CurrentSliderValLabel">Porcentaje :<span id="mostrar1">0%</span></span>
                        {!! Form::hidden('porcentaje',0, ['class' => 'form-control','id' => 'porcentaje']) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('resumen', 'Los objetivos planteados en un comienzo versus los objetivos alcanzados, ¿en que porcentaje concuerdan?') !!}<br></br>
                       <b>0%   </b>         <input id="ex2" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value=""/><b> 100% </b><span id="ex6CurrentSliderValLabel">Porcentaje : <span id="mostrar2">0%</span></span>
                    {!! Form::hidden('objalcanzados',0, ['class' => 'form-control','id' => 'objalcanzados']) !!}

                    </div>


                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('resumen', 'Resumen:') !!}
                        <a align="right" type="button" class="btn btn-info btn-sm" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum 
                        faucibus."><span class="glyphicon glyphicon-info-sign"></span></a>

                        {!! Form::textarea('resumen', null, ['class' => 'form-control','rows' => 8, 'cols' => 150,'style' => 'resize: none']) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('objetivos', 'Objetivos A+S:') !!}
                        {!! Form::textarea('objetivos', null, ['class' => 'form-control','rows' => 8, 'cols' => 150,'style' => 'resize: none']) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('resultados', 'Resultados:') !!}
                        {!! Form::textarea('resultados', null, ['class' => 'form-control','rows' => 8, 'cols' => 150,'style' => 'resize: none']) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-12">
                        {!! Form::label('conclusion', 'Conclusiones y Reflexiones:') !!}
                        {!! Form::textarea('conclusion', null, ['class' => 'form-control','rows' => 8, 'cols' => 150,'style' => 'resize: none']) !!}
                    </div>


                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar y Cerrar Proyecto', ['class' => 'btn btn-primary']) !!}

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
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


function add(button,id) {
    var row = button.parentNode.parentNode;
  var cells = row.querySelectorAll('td:not(:last-of-type)');
  addToCartTable(cells);
  document.getElementById(id).innerHTML = `<span class="glyphicon glyphicon-ok"></span>`;
}
function add2(button,id) {
    var row = button.parentNode.parentNode;
  var cells = row.querySelectorAll('td:not(:last-of-type)');
  addToCartTable2(cells);
  document.getElementById(id).innerHTML = `<span class="glyphicon glyphicon-ok"></span>`;
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

// Without JQuery
var slider = new Slider('#ex1', {
    formatter: function(value) {
        return  value+'%';
    }
});
slider.on("slide", function(sliderValue) {
    document.getElementById("porcentaje").value = sliderValue;
    document.getElementById("mostrar1").textContent = sliderValue + '%';
});
var slider = new Slider('#ex2', {
    formatter: function(value) {
        return  value+'%';
    }
});
slider.on("slide", function(sliderValue) {
    document.getElementById("objalcanzados").value = sliderValue;
    document.getElementById("mostrar2").textContent = sliderValue + '%';
});
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
#ex1Slider .slider-selection {
    background: #BABABA;
}

</style>