<table class="table">
    <thead>
    <th>Id Project</th>
			<th>Rut</th>
			<th>Pregunta1</th>
			<th>Pregunta2</th>
			<th>Pregunta3</th>
			<th>Pregunta4</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($motivations as $motivation)
        <tr>
            <td>{!! $motivation->id_project !!}</td>
			<td>{!! $motivation->rut !!}</td>
			<td>{!! $motivation->pregunta1 !!}</td>
			<td>{!! $motivation->pregunta2 !!}</td>
			<td>{!! $motivation->pregunta3 !!}</td>
			<td>{!! $motivation->pregunta4 !!}</td>
            <td>
                <a href="{!! route('motivations.edit', [$motivation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('motivations.delete', [$motivation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Motivation?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
