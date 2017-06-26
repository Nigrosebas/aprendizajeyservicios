<table class="table">
    <thead>
    <th>Id Proyecto</th>
			<th>Rut</th>
			<th>Rol</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($alumnoproyectos as $alumnoproyecto)
        <tr>
            <td>{!! $alumnoproyecto->id_proyecto !!}</td>
			<td>{!! $alumnoproyecto->rut !!}</td>
			<td>{!! $alumnoproyecto->rol !!}</td>
            <td>
                <a href="{!! route('alumnoproyectos.edit', [$alumnoproyecto->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('alumnoproyectos.delete', [$alumnoproyecto->id]) !!}" onclick="return confirm('Are you sure wants to delete this AlumnoProyecto?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
