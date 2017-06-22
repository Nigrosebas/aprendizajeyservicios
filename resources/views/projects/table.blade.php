<table class="table">
    <thead>
        <th>Nombre Proyecto</th>
		<th>Year</th>
        <th>Curso</th>
    <th width="150px">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->project_name !!}</td>
			<td>{!! $project->year !!}</td>
            <td>{!! $project->id_course!!}</td>
            <td>
            <a href="{!! route('projects.show', [$project->id]) !!}"><i class="glyphicon glyphicon-th"></i></a>
                <a href="{!! route('projects.edit', [$project->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('projects.delete', [$project->id]) !!}" onclick="return confirm('Are you sure wants to delete this Project?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
