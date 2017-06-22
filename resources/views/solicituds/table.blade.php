

    @foreach($solicituds as $solicitud)
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title" align="center">Empresa : {!! $solicitud->nombre_empresa !!}</h1>
      </div>
      <div class="panel-body">
        <table class="table">
          <thead>
      			<th>Clasificacion</th>
      			<th>Ubicacion</th>
      			<th>Prioridad</th>
      			<th>Area</th>
      			<th>Nivel</th>
      			<th>Duracion</th>
        		<th width="50px">Action</th>
        	</thead>
        	<tbody>
          	<td>{!! $solicitud->clasificacion !!}</td>
      			<td>{!! $solicitud->ubicacion !!}</td>
      			<td>{!! $solicitud->prioridad !!}</td>
      			<td>{!! $solicitud->area !!}</td>
      			<td>{!! $solicitud->nivel !!}</td>
      			<td>{!! $solicitud->duracion !!}</td>
            <td><a href="{!! route('solicituds.edit', [$solicitud->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('solicituds.delete', [$solicitud->id]) !!}" onclick="return confirm('Are you sure wants to delete this Solicitud?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="panel-body col-sm-6">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h1 class="panel-title" align="center">Requerido</h1>
            </div>
            <div class="panel-body">
              {!! $solicitud->requerido !!}
            </div>
          </div>
        </div>
        <div class="panel-body col-sm-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h1 class="panel-title" align="center">Postular</h1>
            </div>
            <div class="panel-body">
              Crear Grupo
            </div>
          </div>
        </div>
      </div>
    </div>
      @endforeach
