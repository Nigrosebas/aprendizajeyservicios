<table class="table">
    <thead>
    <th>Id Project</th>
			<th>Rut</th>
			<th>Pregunta1</th>
			<th>Pregunta2</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($planifications as $planification)
        <tr>
            <td>{!! $planification->id_project !!}</td>
			<td>{!! $planification->rut !!}</td>
			<td>{!! $planification->pregunta1 !!}</td>
			<td>{!! $planification->pregunta2 !!}</td>
            <td>
                <a href="{!! route('planifications.edit', [$planification->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('planifications.delete', [$planification->id]) !!}" onclick="return confirm('Are you sure wants to delete this Planification?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
