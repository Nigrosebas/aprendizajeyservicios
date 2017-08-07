<table class="table">
    <thead>
			<th>Facultad</th>
			<th>Nombre del Curso</th>
    <th width="50px">Editar/Borrar</th>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
			<td>{!! $course->name_faculty !!}</td>
			<td>{!! $course->name_course !!}</td>
            <td align="center">
                <a href="{!! route('courses.edit', [$course->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('courses.delete', [$course->id]) !!}" onclick="return confirm('Está seguro de borrar la Carrera?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
