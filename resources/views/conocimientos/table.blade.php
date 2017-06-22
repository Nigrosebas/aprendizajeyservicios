<table class="table">
    <thead>
    <th>Id Alumno</th>
			<th>Conocimiento</th>
			<th>Nivel</th>
			<th>Comentario</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($conocimientos as $conocimientos)
        <tr>
            <td>{!! $conocimientos->id_alumno !!}</td>
			<td>{!! $conocimientos->conocimiento !!}</td>
			<td>{!! $conocimientos->nivel !!}</td>
			<td>{!! $conocimientos->comentario !!}</td>
            <td>
                <a href="{!! route('conocimientos.edit', [$conocimientos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('conocimientos.delete', [$conocimientos->id]) !!}" onclick="return confirm('Are you sure wants to delete this Conocimientos?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
