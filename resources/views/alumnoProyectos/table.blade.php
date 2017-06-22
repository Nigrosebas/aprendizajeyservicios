<table class="table">
    <thead>
    <th>Id Proyecto</th>
			<th>Rut</th>
			<th>Rol</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($alumnoProyectos as $alumnoProyecto)
        <tr>
            <td>{!! $alumnoProyecto->id_proyecto !!}</td>
			<td>{!! $alumnoProyecto->rut !!}</td>
			<td>{!! $alumnoProyecto->rol !!}</td>
            <td>
                <a href="{!! route('alumnoProyectos.edit', [$alumnoProyecto->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('alumnoProyectos.delete', [$alumnoProyecto->id]) !!}" onclick="return confirm('Are you sure wants to delete this AlumnoProyecto?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
