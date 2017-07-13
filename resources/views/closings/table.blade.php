<table class="table">
    <thead>
    <th>Id Project</th>
			<th>Rut</th>
			<th>Pregunta1</th>
			<th>Pregunta2</th>
			<th>Pregunta3</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($closings as $closing)
        <tr>
            <td>{!! $closing->id_project !!}</td>
			<td>{!! $closing->rut !!}</td>
			<td>{!! $closing->pregunta1 !!}</td>
			<td>{!! $closing->pregunta2 !!}</td>
			<td>{!! $closing->pregunta3 !!}</td>
            <td>
                <a href="{!! route('closings.edit', [$closing->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('closings.delete', [$closing->id]) !!}" onclick="return confirm('Are you sure wants to delete this Closing?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
