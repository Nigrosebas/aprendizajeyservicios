<table class="table">
    <thead>
        <th>Nombre Proyecto</th>
		<th>Year</th>
        <th>Curso</th>
        <th>Estado</th>
    <th width="150px">Acciones</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->project_name !!}</td>
			<td>{!! $project->year !!}</td>
            <td>{!! $project->id_course!!}</td>
            <td>{!! $project->estado!!}</td>
            <td>
            <a href="{!! route('projects.acceso', [$project->id]) !!}"><i class="glyphicon glyphicon-th">Acceder</i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
