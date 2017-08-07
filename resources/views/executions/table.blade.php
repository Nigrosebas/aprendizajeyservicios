<table class="table">
    <thead>
    <th>Id Project</th>
			<th>Rut</th>
			<th>Pregunta1</th>
			<th>Pregunta2</th>
			<th>Pregunta3</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($executions as $execution)
        <tr>
            <td>{!! $execution->id_project !!}</td>
			<td>{!! $execution->rut !!}</td>
			<td>{!! $execution->pregunta1 !!}</td>
			<td>{!! $execution->pregunta2 !!}</td>
			<td>{!! $execution->pregunta3 !!}</td>
            <td>
                <a href="{!! route('executions.edit', [$execution->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('executions.delete', [$execution->id]) !!}" onclick="return confirm('Estas seguro de borrar una Ejecución?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
