<table class="table">
    <thead>
    <th>Id Project</th>
			<th>Rut</th>
			<th>Pregunta1</th>
			<th>Preguntar2</th>
			<th>Pregunta3</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($diagnostics as $diagnostic)
        <tr>
            <td>{!! $diagnostic->id_project !!}</td>
			<td>{!! $diagnostic->rut !!}</td>
			<td>{!! $diagnostic->pregunta1 !!}</td>
			<td>{!! $diagnostic->preguntar2 !!}</td>
			<td>{!! $diagnostic->pregunta3 !!}</td>
            <td>
                <a href="{!! route('diagnostics.edit', [$diagnostic->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('diagnostics.delete', [$diagnostic->id]) !!}" onclick="return confirm('Desea eliminar el Diagnostico')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
